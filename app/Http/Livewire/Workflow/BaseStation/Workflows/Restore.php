<?php

namespace App\Http\Livewire\Workflow\BaseStation\Workflows;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Services\Workflow\BaseStation\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
{
    use WithDispatching;

    public BaseStationWorkflow $workflow;

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
        return view('livewire.workflow.base-station.workflows.restore');
    }
}
