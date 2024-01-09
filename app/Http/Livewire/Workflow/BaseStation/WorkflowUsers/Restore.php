<?php

namespace App\Http\Livewire\Workflow\BaseStation\WorkflowUsers;

use App\Models\Workflow\BaseStation\BaseStationWorkflowUsers;
use App\Services\Workflow\BaseStation\Users\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
{
    use WithDispatching;

    public BaseStationWorkflowUsers $user;

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
        return view('livewire.workflow.base-station.workflow-users.restore');
    }
}
