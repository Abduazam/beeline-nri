<?php

namespace App\Http\Livewire\Data\GeneralContractors;

use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Services\Data\GeneralContractor\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
{
    use WithDispatching;

    public ?GeneralContractor $general_contractors = null;

    protected array $rules = [
        'general_contractor.title' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->general_contractors);

            $this->dispatchSuccess('restore', 'restoring-succeed', $validatedData['general_contractors']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.general-contractors.restore');
    }
}
