<?php

namespace App\Http\Livewire\Data\LocationAntennas;

use App\Models\Data\LocationAntenna\LocationAntenna;
use App\Services\Data\LocationAntenna\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
{
    use WithDispatching;

    public ?LocationAntenna $location_antenna = null;

    protected array $rules = [
        'location_antenna.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->location_antenna);

            $this->dispatchSuccess('restore', 'restoring-succeed', $validatedData['location_antenna']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.location-antennas.restore');
    }
}
