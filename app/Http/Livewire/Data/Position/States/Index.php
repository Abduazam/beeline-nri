<?php

namespace App\Http\Livewire\Data\Position\States;

use App\Models\Data\Position\State\State;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $states = State::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->whereHas('translations', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')->where('locale', App::getLocale());
                });
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $states = ($this->perPage === 0) ? $states->get() : $states->paginate($this->perPage);

        return view('livewire.data.position.states.index', compact('states'));
    }
}
