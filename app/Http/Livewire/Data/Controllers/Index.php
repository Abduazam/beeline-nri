<?php

namespace App\Http\Livewire\Data\Controllers;

use App\Models\Area\Region\Region;
use App\Models\Data\Controllers\Controller;
use App\Repository\Area\Regions\RegionRepository;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    public string|int $region_id = '';

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $controllers = Controller::with('region')
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($this->region_id, function ($query, $region_id) {
                $query->where('region_id', $region_id);
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $controllers = ($this->perPage === 0) ? $controllers->get() : $controllers->paginate($this->perPage);

        return view('livewire.data.controllers.index', [
            'controllers' => $controllers,
            'regions' => Region::query()->withWhereHas('translations',  function ($query) {
                    $query->where('locale', app()->getLocale());
                })->get(),
        ]);
    }
}
