<?php

namespace App\Http\Livewire\User\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;
use App\Services\User\Roles\Create\CreateService;

class Create extends Component
{
    public ?string $name = null;
    public array $permissions = [];

    protected array $rules = [
        'name' => ['required', 'unique:roles,name', 'min:2'],
        'permissions' => ['nullable', 'array'],
        'permissions.*' => ['numeric'],
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

        $service->create($validatedData);

        return redirect()->route('user.roles.index');
    }

    public function render(): View
    {
        $accesses = Permission::all();
        return view('livewire.user.roles.create', compact('accesses'));
    }
}
