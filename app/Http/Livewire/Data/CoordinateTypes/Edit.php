<?php

namespace App\Http\Livewire\Data\CoordinateTypes;

use App\Models\Data\Coordinate\CoordinateType;
use App\Services\Data\CoordinateType\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public ?CoordinateType $type = null;

    protected array $rules = [
        'type.name' => ['required', 'string', 'min:2'],
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
            $service->update($validatedData, $this->type);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['type']['name']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.coordinate-types.edit');
    }
}
