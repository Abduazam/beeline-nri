<?php

namespace App\Http\Livewire\Data\RoomTypes;

use App\Models\Data\RoomType\RoomType;
use App\Services\Data\RoomType\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public ?RoomType $room_type = null;

    protected array $rules = [
        'room_type.title' => ['required', 'string', 'min:2'],
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
            $service->update($validatedData, $this->room_type);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['room_type']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.room-types.edit');
    }
}
