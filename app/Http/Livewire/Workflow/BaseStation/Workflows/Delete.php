<?php

namespace App\Http\Livewire\Workflow\BaseStation\Workflows;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Services\Workflow\BaseStation\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public BaseStationWorkflow $workflow;

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
        return view('livewire.workflow.base-station.workflows.delete');
    }
}
