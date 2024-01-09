<?php

namespace App\Http\Livewire\Workflow\Position\Workflows;

use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Models\Workflow\Position\PositionWorkflow;
use App\Services\Workflow\Position\Restore\RestoreService;

class Restore extends Component
{
    use WithDispatching;

    public PositionWorkflow $workflow;

    /**
     * @throws Throwable
     */
    public function restore(RestoreService $service): void
    {
        try {
            $service->restore($this->workflow);

            $this->dispatchSuccess('restore', 'restoring-succeed', $this->workflow->title);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.workflow.position.workflows.restore');
    }
}
