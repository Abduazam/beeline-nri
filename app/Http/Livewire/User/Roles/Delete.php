<?php

namespace App\Http\Livewire\User\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\User\Roles\Delete\DeleteService;

class Delete extends Component
{
    use WithDispatching;

    public ?Role $role = null;

    protected array $rules = [
        'role.name' => 'required',
    ];

    /**
     * @throws Exception
     */
    public function delete(DeleteService $service): void
    {
        try {
            if ($this->role->id !== 1 and $this->role->name !== "admin") {
                $this->validate();
                $service->delete($this->role);

                $title = 'deleting-succeed';
            } else {
                $title = 'deleting-failed';
            }

            $this->dispatchSuccess('delete', $title, $this->role->name);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.user.roles.delete');
    }
}
