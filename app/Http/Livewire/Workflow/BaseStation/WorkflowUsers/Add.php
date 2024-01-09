<?php

namespace App\Http\Livewire\Workflow\BaseStation\WorkflowUsers;

use App\Models\User\User;
use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Services\Workflow\BaseStation\Users\AddService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Add extends Component
{
    use WithDispatching;

    public BaseStationWorkflow $workflow;
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
                $query->where('name', 'accept base-station');
            })
            ->whereNot('id', 1)
            ->whereNotIn('id', function ($query) {
                $query->select('user_id')
                    ->from('base_station_workflow_users')
                    ->where('base_station_workflow_id', $this->workflow->id);
            })->get();

        return view('livewire.workflow.base-station.workflow-users.add', compact('users'));
    }
}
