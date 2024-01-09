<?php

namespace App\Http\Livewire\User\Permissions;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\User\Permissions\Update\UpdateService;

class Edit extends Component
{
    use WithDispatching;

    public ?Permission $permission = null;

    protected array $rules = [
        'permission.content' => ['required', 'string', 'min:2'],
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
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();

            $service->update($validatedData, $this->permission);

            $this->dispatchSuccess('edit', 'editing-succeed', $this->permission->name);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.user.permissions.edit');
    }
}
