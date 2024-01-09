<?php

namespace App\Http\Livewire\Workflow\BaseStation\Workflows;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Models\Workflow\BaseStation\BaseStationWorkflowUsers;
use Illuminate\View\View;
use Livewire\Component;

class Users extends Component
{
    public BaseStationWorkflow $workflow;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $users = BaseStationWorkflowUsers::query()
            ->with('user')
            ->withTrashed()
            ->where('base_station_workflow_id', $this->workflow->id)
            ->get();

        return view('livewire.workflow.base-station.workflows.users', compact('users'));
    }
}
