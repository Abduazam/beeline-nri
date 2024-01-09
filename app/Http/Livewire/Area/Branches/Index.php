<?php

namespace App\Http\Livewire\Area\Branches;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Area\Branch\Branch;
use Illuminate\Support\Facades\App;
use App\Traits\Livewire\WithSorting;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithPaginating;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $branches = Branch::query()
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
        $branches = ($this->perPage === 0) ? $branches->get() : $branches->paginate($this->perPage);

        return view('livewire.area.branches.index', compact('branches'));
    }
}
