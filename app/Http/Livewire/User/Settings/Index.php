<?php

namespace App\Http\Livewire\User\Settings;

use Livewire\Component;
use App\Models\User\User;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Services\User\UserService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;

class Index extends Component
{
    use WithFileUploads, WithDispatching;

    public ?User $user = null;
    public ?string $password = null;
    public ?string $password_confirmation = null;
    public mixed $image = null;

    protected $listeners = ['refresh' => '$refresh'];

    protected array $rules = [
        'user.name' => ['required', 'string', 'min:2'],
        'user.email' => ['required', 'email', 'min:5'],
        'password' => ['nullable', "min:3"],
        'password_confirmation' => ['nullable', 'same:password', "min:3"],
        'image' => ['nullable', 'mimes:jpg,png,jpeg,heic,svg'],
    ];

    public function mount(): void
    {
        $this->user = User::query()->findOrFail(auth()->user()->id);
    }

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

    public function update(UserService $service): void
    {
        try {
            $validatedData = $this->validate();

            $service->edit($this->user, $validatedData, $this->image);

            $this->dispatchSuccess('edit', 'editing-succeed', $this->user->name);
            $this->reset();
            $this->mount();
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.user.settings.index');
    }
}
