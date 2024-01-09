<?php

namespace App\Http\Livewire\Data\LocationAntennas;

use App\Models\Data\LocationAntenna\LocationAntenna;
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
        $location_antennas = LocationAntenna::query()
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $location_antennas = ($this->perPage === 0) ? $location_antennas->get() : $location_antennas->paginate($this->perPage);

        return view('livewire.data.location-antennas.index', compact('location_antennas'));
    }
}
