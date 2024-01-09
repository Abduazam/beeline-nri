<?php

namespace App\Http\Livewire\Workflow\Position\WorkflowUsers;

use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithDispatching;
use App\Models\Workflow\Position\PositionWorkflowUsers;
use App\Services\Workflow\Position\Users\RestoreService;

class Restore extends Component
{
    use WithDispatching;

    public PositionWorkflowUsers $user;

    /**
     * @throws Throwable
     */
    public function restore(RestoreService $service): void
    {
        $service->restore($this->user);
        $this->dispatchSuccess('restore', 'restoring-succeed', $this->user->user->name);
        $this->emitUp('refresh');
    }

    public function render(): View
    {
        return view('livewire.workflow.position.workflow-users.restore');
    }
}
