<?php

namespace App\Http\Livewire\Area\Areas;

use App\Models\Area\Area\Area;
use App\Models\Area\Region\Region;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithSorting;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithPaginating;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    public string|int $branch_id = '';
    public string|int $region_id = '';
    public $regions = [];

    protected $listeners = ['refresh' => '$refresh'];

    public function updatedBranchId($branch_id): void
    {
        $this->regions = Region::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->where('branch_id', $this->branch_id)
            ->get();
    }

    public function render(): View
    {
        $areas = Area::query()
            ->with('region.branch')
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($this->region_id, function ($query, $region_id) {
                $query->where('region_id', $region_id);
            })
            ->when($this->branch_id, function ($query, $branch_id) {
                $query->whereHas('region.branch', function ($query) use ($branch_id) {
                    $query->where('id', $branch_id);
                });
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
        $areas = ($this->perPage === 0) ? $areas->get() : $areas->paginate($this->perPage);

        return view('livewire.area.areas.index', compact('areas'));
    }
}
