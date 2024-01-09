<?php

namespace App\Http\Livewire\Data\CoordinateTypes;

use App\Models\Data\Coordinate\CoordinateType;
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
        $types = CoordinateType::query()
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $types = ($this->perPage === 0) ? $types->get() : $types->paginate($this->perPage);

        return view('livewire.data.coordinate-types.index', compact('types'));
    }
}
