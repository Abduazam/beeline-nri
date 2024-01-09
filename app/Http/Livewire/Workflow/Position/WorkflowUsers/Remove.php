<?php

namespace App\Http\Livewire\Workflow\Position\WorkflowUsers;

use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithDispatching;
use App\Services\Workflow\Position\Users\RemoveService;
use App\Models\Workflow\Position\PositionWorkflowUsers;

class Remove extends Component
{
    use WithDispatching;

    public PositionWorkflowUsers $user;

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
        return view('livewire.workflow.position.workflow-users.remove');
    }
}
