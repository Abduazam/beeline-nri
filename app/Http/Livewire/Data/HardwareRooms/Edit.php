<?php

namespace App\Http\Livewire\Data\HardwareRooms;

use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Services\Data\HardwareRoom\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public ?HardwareRoom $hardware_room = null;

    protected array $rules = [
        'hardware_room.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

    /**
     * @throws Throwable
     */
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->update($validatedData, $this->hardware_room);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['hardware_room']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.hardware-rooms.edit');
    }
}
