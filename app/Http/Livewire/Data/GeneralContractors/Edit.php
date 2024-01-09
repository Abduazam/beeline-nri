<?php

namespace App\Http\Livewire\Data\GeneralContractors;

use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Models\Data\GeneralContractor\GeneralContractorType;
use App\Services\Data\GeneralContractor\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public ?GeneralContractor $general_contractor = null;

    protected array $rules = [
        'general_contractor.general_contractor_type_id' => ['required', 'numeric', 'exists:general_contractor_types,id'],
        'general_contractor.inn' => ['required', 'string', 'min:2'],
        'general_contractor.title' => ['required', 'string', 'min:2'],
        'general_contractor.address' => ['nullable', 'string', 'min:2'],
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
            $service->update($validatedData, $this->general_contractor);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['general_contractor']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.general-contractors.edit', [
            'types' => GeneralContractorType::all(),
        ]);
    }
}
