<?php

namespace App\Http\Livewire\Data\LocationAntennas;

use App\Models\Data\LocationAntenna\LocationAntenna;
use App\Services\Data\LocationAntenna\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public ?LocationAntenna $location_antenna = null;

    protected array $rules = [
        'location_antenna.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->location_antenna);

            $this->dispatchSuccess('delete', 'deleting-succeed', $validatedData['location_antenna']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.location-antennas.delete');
    }
}
