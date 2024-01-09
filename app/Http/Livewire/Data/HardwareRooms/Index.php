<?php

namespace App\Http\Livewire\Data\HardwareRooms;

use App\Models\Data\HardwareRoom\HardwareRoom;
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
        $hardware_rooms = HardwareRoom::query()
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $hardware_rooms = ($this->perPage === 0) ? $hardware_rooms->get() : $hardware_rooms->paginate($this->perPage);

        return view('livewire.data.hardware-rooms.index', compact('hardware_rooms'));
    }
}
