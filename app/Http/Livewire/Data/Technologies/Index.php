<?php

namespace App\Http\Livewire\Data\Technologies;

use App\Models\Data\Technology\Technology;
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
        $technologies = Technology::query()
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $technologies = ($this->perPage === 0) ? $technologies->get() : $technologies->paginate($this->perPage);

        return view('livewire.data.technologies.index', compact('technologies'));
    }
}
