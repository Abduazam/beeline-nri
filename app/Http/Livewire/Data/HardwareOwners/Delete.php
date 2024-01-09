<?php

namespace App\Http\Livewire\Data\HardwareOwners;

use App\Models\Data\HardwareOwner\HardwareOwner;
use App\Services\Data\HardwareOwner\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public ?HardwareOwner $hardware_owner = null;

    protected array $rules = [
        'hardware_owner.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->hardware_owner);

            $this->dispatchSuccess('delete', 'deleting-succeed', $validatedData['hardware_owner']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.hardware-owners.delete');
    }
}
