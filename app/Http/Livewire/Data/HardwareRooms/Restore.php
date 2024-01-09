<?php

namespace App\Http\Livewire\Data\HardwareRooms;

use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Services\Data\HardwareRoom\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
{
    use WithDispatching;

    public ?HardwareRoom $hardware_room = null;

    protected array $rules = [
        'hardware_room.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->hardware_room);

            $this->dispatchSuccess('restore', 'restoring-succeed', $validatedData['hardware_room']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.hardware-rooms.restore');
    }
}
