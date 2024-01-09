<?php

namespace App\Http\Livewire\Workflow\Position\Workflows;

use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Models\Workflow\Position\PositionWorkflow;
use App\Services\Workflow\Position\Update\UpdateService;

class Edit extends Component
{
    use WithDispatching;

    public PositionWorkflow $workflow;

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
        return view('livewire.workflow.position.workflows.edit');
    }
}
