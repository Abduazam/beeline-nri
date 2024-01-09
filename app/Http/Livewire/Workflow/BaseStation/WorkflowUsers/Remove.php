<?php

namespace App\Http\Livewire\Workflow\BaseStation\WorkflowUsers;

use App\Models\Workflow\BaseStation\BaseStationWorkflowUsers;
use App\Services\Workflow\BaseStation\Users\RemoveService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Remove extends Component
{
    use WithDispatching;

    public BaseStationWorkflowUsers $user;

    /**
     * @throws Throwable
     */
    public function delete(RemoveService $service): void
    {
        $service->delete($this->user);
        $this->dispatchSuccess('delete', 'deleting-succeed', $this->user->user->name);
        $this->emit('refresh');
    }

    public function render(): View
    {
        return view('livewire.workflow.base-station.workflow-users.remove');
    }
}
