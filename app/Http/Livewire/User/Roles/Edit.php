<?php

namespace App\Http\Livewire\User\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;
use App\Services\User\Roles\Update\UpdateService;

class Edit extends Component
{
    public ?Role $role = null;
    public array $permissions = [];

    protected array $rules = [
        'role.name' => ['required', 'min:2'],
        'permissions' => ['nullable', 'array'],
        'permissions.*' => ['numeric'],
    ];

    public function mount(): void
    {
        $this->permissions = Permission::query()
            ->select('permissions.*')
            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('role_has_permissions.role_id', $this->role->id)
            ->pluck('id')->toArray();
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

        $service->update($validatedData, $this->role);

        return redirect()->route('user.roles.index');
    }

    public function render(): View
    {
        $accesses = Permission::all();
        return view('livewire.user.roles.edit', compact('accesses'));
    }
}
