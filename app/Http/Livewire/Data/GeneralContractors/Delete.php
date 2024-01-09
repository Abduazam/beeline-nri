<?php

namespace App\Http\Livewire\Data\GeneralContractors;

use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Services\Data\GeneralContractor\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public ?GeneralContractor $general_contractor = null;

    protected array $rules = [
        'general_contractor.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->general_contractor);

            $this->dispatchSuccess('delete', 'deleting-succeed', $validatedData['general_contractor']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.general-contractors.delete');
    }
}
