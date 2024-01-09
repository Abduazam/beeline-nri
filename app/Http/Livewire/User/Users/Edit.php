<?php

namespace App\Http\Livewire\User\Users;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\User\User;
use Livewire\WithFileUploads;
use App\Models\User\UserBranch;
use App\Models\Area\Branch\Branch;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\App;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\User\Users\Update\UpdateService;

class Edit extends Component
{
    use WithFileUploads, WithDispatching;

    public ?User $user = null;
    public ?int $role_id = null;
    public array $user_branches = [];
    public ?string $password = null;
    public ?string $password_confirmation = null;
    public mixed $image = null;
    public bool $disabled = false;

    protected array $rules = [
        'user.name' => ['required', 'string', 'min:2'],
        'user.email' => ['required', 'email', 'min:5'],
        'role_id' => ['required', 'numeric'],
        'user_branches' => ['nullable', 'array'],
        'user_branches.*' => ['numeric'],
        'password' => ['nullable', "min:3"],
        'password_confirmation' => ['nullable', 'same:password', "min:3"],
        'image' => ['nullable', 'mimes:jpg,png,jpeg,heic,svg'],
    ];

    public function mount(): void
    {
        $this->role_id = $this?->user?->roles?->first()?->id;
        $this->disabled = $this->checkUserRole();
        $this->user_branches = UserBranch::query()->where('user_id', $this->user?->id)->pluck('branch_id')->toArray();
    }

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

    /**
     * @throws Exception
     */
    public function update(UpdateService $service)
    {
        $validatedData = $this->validate();

        if ($this->disabled and $validatedData['role_id'] !== $this->user->role->role_id) {
            $this->dispatchSuccess('edit', 'editing-failed', $this->user->name);
            $this->role_id = $this->user->role->role_id;
        } else {
            $service->update($this->user, $validatedData, $this->image);
            return redirect()->route('user.users.index');
        }
    }

    private function checkUserRole(): bool
    {
        if ($this->user->id == 1 and $this->role_id == 1) {
            return true;
        }

        return false;
    }

    public function render(): View
    {
        $roles = Role::query()->get();
        $branches = Branch::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();

        return view('livewire.user.users.edit', compact('roles', 'branches'));
    }
}
