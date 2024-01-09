<?php

namespace App\Http\Livewire\Data\Diapasons;

use App\Models\Data\Diapason\Diapason;
use App\Services\Data\Diapason\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public ?Diapason $diapason = null;

    protected array $rules = [
        'diapason.technology_id' => ['required', 'numeric', 'exists:technologies,id'],
        'diapason.band' => ['required', 'numeric'],
    ];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->diapason);

            $this->dispatchSuccess('delete', 'deleting-succeed', $this->diapason->technology->name . '-' . $validatedData['diapason']['band']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.diapasons.delete');
    }
}
