<?php

namespace App\Http\Livewire\Data\HardwareRooms;

use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Services\Data\HardwareRoom\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public ?HardwareRoom $hardware_room = null;

    protected array $rules = [
        'hardware_room.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->hardware_room);

            $this->dispatchSuccess('delete', 'deleting-succeed', $validatedData['hardware_room']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.hardware-rooms.delete');
    }
}
