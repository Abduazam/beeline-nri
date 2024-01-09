<?php

namespace App\Http\Livewire\BaseStations\BaseStation;

use App\Http\Livewire\BaseStations\BaseStation\Traits\BaseStationFilterTrait;
use App\Repository\BaseStations\BaseStation\BaseStationRepository;
use App\Repository\Positions\Position\PositionRepository;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Livewire\Component;
use Illuminate\View\View;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;
    use BaseStationFilterTrait;

    public function render(BaseStationRepository $baseStationRepository, PositionRepository $positionRepository): View
    {
        // dd($baseStationRepository->getFiltered($this->search, $this->perPage, $this->orderBy, $this->orderDirection));

        return view('livewire.base-stations.base-station.index', [
            'base_stations' => $baseStationRepository->getFiltered($this->search, $this->perPage, $this->orderBy, $this->orderDirection),
            'regions' => $positionRepository->getRegions(),
            'areas' => $positionRepository->getAreas(),
            'statuses' => $positionRepository->getStatuses(),
            'states' => $positionRepository->getStates(),
            'application_types' => $baseStationRepository->getApplicationTypes(),
        ]);
    }
}
