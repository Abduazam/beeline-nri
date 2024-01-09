<?php

namespace App\Http\Livewire\Data\LocationAntennas;

use App\Models\Data\LocationAntenna\LocationAntenna;
use App\Services\Data\LocationAntenna\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public ?LocationAntenna $location_antenna = null;

    protected array $rules = [
        'location_antenna.title' => ['required', 'string', 'min:2'],
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
            $service->update($validatedData, $this->location_antenna);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['location_antenna']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.location-antennas.edit');
    }
}
