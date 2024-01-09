<?php

namespace App\Http\Livewire\Data\HardwareOwners;

use App\Models\Data\HardwareOwner\HardwareOwner;
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
        $hardware_owners = HardwareOwner::query()
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $hardware_owners = ($this->perPage === 0) ? $hardware_owners->get() : $hardware_owners->paginate($this->perPage);

        return view('livewire.data.hardware-owners.index', compact('hardware_owners'));
    }
}
