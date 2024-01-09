<?php

namespace App\Http\Livewire\Data\CoordinateTypes;

use App\Models\Data\Coordinate\CoordinateType;
use App\Services\Data\CoordinateType\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
{
    use WithDispatching;

    public ?CoordinateType $type = null;

    protected array $rules = [
        'type.name' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->type);

            $this->dispatchSuccess('restore', 'restoring-succeed', $validatedData['type']['name']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.coordinate-types.restore');
    }
}
