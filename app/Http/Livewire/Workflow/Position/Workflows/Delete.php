<?php

namespace App\Http\Livewire\Workflow\Position\Workflows;

use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Models\Workflow\Position\PositionWorkflow;
use App\Services\Workflow\Position\Delete\DeleteService;

class Delete extends Component
{
    use WithDispatching;

    public PositionWorkflow $workflow;

    protected $listeners = ['refresh' => '$refresh'];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $service->delete($this->workflow);

            $this->dispatchSuccess('delete', 'deleting-succeed', $this->workflow->title);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.workflow.position.workflows.delete');
    }
}
