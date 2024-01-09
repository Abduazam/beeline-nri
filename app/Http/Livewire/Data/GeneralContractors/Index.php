<?php

namespace App\Http\Livewire\Data\GeneralContractors;

use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $general_contractors = GeneralContractor::query()
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $general_contractors = ($this->perPage === 0) ? $general_contractors->get() : $general_contractors->paginate($this->perPage);

        return view('livewire.data.general-contractors.index', compact('general_contractors'));
    }
}
