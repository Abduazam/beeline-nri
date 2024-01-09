<?php

namespace App\Http\Livewire\Data\RoomTypes;

use App\Models\Data\RoomType\RoomType;
use App\Services\Data\RoomType\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public ?RoomType $room_type = null;

    protected array $rules = [
        'room_type.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->room_type);

            $this->dispatchSuccess('delete', 'deleting-succeed', $validatedData['room_type']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.room-types.delete');
    }
}
