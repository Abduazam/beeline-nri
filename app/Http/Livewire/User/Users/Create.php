<?php

namespace App\Http\Livewire\User\Users;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Models\Area\Branch\Branch;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use App\Services\User\Users\Create\CreateService;

class Create extends Component
{
    use WithFileUploads;

    public ?string $name = null;
    public ?string $email = null;
    public ?int $role_id = null;
    public array $user_branches = [];
    public ?string $password = null;
    public ?string $password_confirmation = null;
    public mixed $image = null;

    protected array $rules = [
        'name' => ['required', 'string', 'min:2'],
        'email' => ['required', 'email', 'unique:users,email', 'min:5'],
        'role_id' => ['required', 'numeric'],
        'user_branches' => ['nullable', 'array'],
        'user_branches.*' => ['numeric'],
        'password' => ['required', "min:3"],
        'password_confirmation' => ['same:password', "min:3"],
        'image' => ['nullable', 'mimes:jpg,png,jpeg,heic,svg'],
    ];

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
    public function store(CreateService $service)
    {
        $validatedData = $this->validate();

        $service->create($validatedData, $this->image);

        return redirect()->route('user.users.index');
    }

    public function render(): View
    {
        $roles = Role::query()->get();
        $branches = Branch::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();

        return view('livewire.user.users.create', compact('roles', 'branches'));
    }
}
