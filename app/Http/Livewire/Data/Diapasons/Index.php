<?php

namespace App\Http\Livewire\Data\Diapasons;

use App\Models\Data\Diapason\Diapason;
use App\Models\Data\Technology\Technology;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    public string|int $technology_id = '';

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $diapasons = Diapason::with('technology')
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('band', 'like', '%' . $search . '%');
            })
            ->when($this->technology_id, function ($query, $technology_id) {
                $query->where('technology_id', $technology_id);
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $diapasons = ($this->perPage === 0) ? $diapasons->get() : $diapasons->paginate($this->perPage);

        $technologies = Technology::select('id', 'name')->get();

        return view('livewire.data.diapasons.index', compact('diapasons', 'technologies'));
    }
}
