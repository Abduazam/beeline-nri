<?php

namespace App\Http\Livewire\Area\Regions;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Area\Region\Region;
use Illuminate\Support\Facades\App;
use App\Traits\Livewire\WithSorting;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithPaginating;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    public string|int $branch_id = '';

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $regions = Region::query()
            ->with('branch')
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($this->branch_id, function ($query, $branch_id) {
                $query->where('regions.branch_id', $branch_id);
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
        $regions = ($this->perPage === 0) ? $regions->get() : $regions->paginate($this->perPage);

        return view('livewire.area.regions.index', compact('regions'));
    }
}
