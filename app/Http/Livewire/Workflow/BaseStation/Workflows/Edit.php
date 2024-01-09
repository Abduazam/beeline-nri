<?php

namespace App\Http\Livewire\Workflow\BaseStation\Workflows;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Services\Workflow\BaseStation\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public BaseStationWorkflow $workflow;

    protected array $rules = [
        'workflow.title' => ['required', 'min:2'],
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
            $service->update($validatedData, $this->workflow);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['workflow']['title']);
            $this->emit('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.workflow.base-station.workflows.edit');
    }
}
