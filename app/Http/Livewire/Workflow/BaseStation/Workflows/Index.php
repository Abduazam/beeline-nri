<?php

namespace App\Http\Livewire\Workflow\BaseStation\Workflows;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSearing, WithSorting;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $steps = BaseStationWorkflow::query()
            ->with('users')
            ->when($this->is_archived === 1, function ($query) {
                return $query->onlyTrashed();
            })
            ->get();

        return view('livewire.workflow.base-station.workflows.index', compact('steps'));
    }
}
