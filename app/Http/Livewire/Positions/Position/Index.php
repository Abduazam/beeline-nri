<?php

namespace App\Http\Livewire\Positions\Position;

use App\Enums\Data\ApplicationType\PositionApplicationTypeEnum;
use App\Repository\Positions\Position\PositionRepository;
use App\Traits\Livewire\Models\Positions\Position\PositionFilterTrait;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;
    use PositionFilterTrait;

    public function mount(): void
    {
        $this->application_type = PositionApplicationTypeEnum::EDIT->value;
    }

    public function render(PositionRepository $repository): View
    {
//         dd($repository->getFiltered($this->chosen_regions, $this->chosen_areas, $this->company_id, $this->perPage, $this->status, $this->state, $this->search, $this->column_select_id, $this->column_name, $this->begin_date, $this->end_date, $this->orderBy, $this->orderDirection));

        return view('livewire.positions.position.index', [
            'positions' => $repository->getFiltered($this->chosen_regions, $this->chosen_areas, $this->company_id, $this->perPage, $this->status, $this->application_type_id, $this->search, $this->column_select_id, $this->column_name, $this->begin_date, $this->end_date, $this->orderBy, $this->orderDirection),
            'regions' => $repository->getRegions(),
            'areas' => $repository->getAreas(),
            'companies' => $repository->getCompanies(),
            'statuses' => $repository->getStatuses(),
            'states' => $repository->getStates(),
            'columns' => $repository->getColumnsName(),
            'application_types' => $repository->getApplicationTypes(),
        ]);
    }
}
