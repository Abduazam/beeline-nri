<?php

namespace App\Http\Livewire\User\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\User\Roles\Restore\RestoreService;

class Restore extends Component
{
    use WithDispatching;

    public ?Role $role = null;

    protected array $rules = [
        'role.name' => 'required',
    ];

    /**
     * @throws Exception
     */
    public function restore(RestoreService $service): void
    {
        try {
            $this->validate();
            $service->restore($this->role);
            $this->dispatchSuccess('restore', 'restoring-succeed', $this->role->name);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.user.roles.restore');
    }
}
