<?php

namespace App\Http\Livewire\Data\RoomTypes;

use App\Models\Data\RoomType\RoomType;
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
        $room_types = RoomType::query()
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $room_types = ($this->perPage === 0) ? $room_types->get() : $room_types->paginate($this->perPage);

        return view('livewire.data.room-types.index', compact('room_types'));
    }
}
