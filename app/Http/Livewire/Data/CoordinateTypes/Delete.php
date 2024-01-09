<?php

namespace App\Http\Livewire\Data\CoordinateTypes;

use App\Models\Data\Coordinate\CoordinateType;
use App\Services\Data\CoordinateType\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public ?CoordinateType $type = null;

    protected array $rules = [
        'type.name' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->type);

            $this->dispatchSuccess('delete', 'deleting-succeed', $validatedData['type']['name']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.coordinate-types.delete');
    }
}
