<?php

namespace App\Http\Livewire\Workflow\Position\Workflows;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use App\Models\Workflow\Position\PositionWorkflow;

class Index extends Component
{
    use WithSearing, WithSorting;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $steps = PositionWorkflow::query()
            ->with('users')
            ->when($this->is_archived === 1, function ($query) {
                return $query->onlyTrashed();
            })
            ->get();

        return view('livewire.workflow.position.workflows.index', compact('steps'));
    }
}
