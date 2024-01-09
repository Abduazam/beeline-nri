<?php

namespace App\Http\Livewire\Data\RoomTypes;

use App\Models\Data\RoomType\RoomType;
use App\Services\Data\RoomType\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
{
    use WithDispatching;

    public ?RoomType $room_type = null;

    protected array $rules = [
        'room_type.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->room_type);

            $this->dispatchSuccess('restore', 'restoring-succeed', $validatedData['room_type']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.room-types.restore');
    }
}
