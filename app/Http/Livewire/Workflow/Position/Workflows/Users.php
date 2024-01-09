<?php

namespace App\Http\Livewire\Workflow\Position\Workflows;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Workflow\Position\PositionWorkflow;
use App\Models\Workflow\Position\PositionWorkflowUsers;

class Users extends Component
{
    public PositionWorkflow $workflow;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $users = PositionWorkflowUsers::query()
            ->with('user')
            ->withTrashed()
            ->where('position_workflow_id', $this->workflow->id)
            ->get();

        return view('livewire.workflow.position.workflows.users', compact('users'));
    }
}
