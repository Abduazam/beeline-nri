<?php

namespace App\Http\Livewire\Workflow\Position\WorkflowUsers;

use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\User\User;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Models\Workflow\Position\PositionWorkflow;
use App\Services\Workflow\Position\Users\AddService;

class Add extends Component
{
    use WithDispatching;

    public PositionWorkflow $workflow;
    public array $data = [];

    protected array $rules = [
        'data' => ['required', 'array'],
        'data.*' => ['required', 'numeric']
    ];

    /**
     * @throws Throwable
     */
    public function add(AddService $service): void
    {
        try {
            $validatedData = $this->validate();

            $service->create($validatedData, $this->workflow);

            $this->dispatchBrowserEvent('refresh-page');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        $users = User::query()
            ->withWhereHas('roles.permissions', function ($query) {
                $query->where('name', 'accept position');
            })
            ->whereNot('id', 1)
            ->whereNotIn('id', function ($query) {
                $query->select('user_id')
                    ->from('position_workflow_users')
                    ->where('position_workflow_id', $this->workflow->id);
            })->get();

        return view('livewire.workflow.position.workflow-users.add', compact('users'));
    }
}
