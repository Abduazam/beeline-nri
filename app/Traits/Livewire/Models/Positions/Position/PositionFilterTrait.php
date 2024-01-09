<?php

namespace App\Traits\Livewire\Models\Positions\Position;

use App\Repository\Positions\Position\PositionRepository;
use Illuminate\Database\Eloquent\Collection;

trait PositionFilterTrait
{
    public bool $region_id = true;
    public bool $area_id = true;
    public array $chosen_regions = [];
    public array $chosen_areas = [];
    public int $company_id = 0;

    public int $status = 0;
    public int $state = 0;
    public int $application_type_id = 1;

    public string $column_name = '';
    public int $column_select_id = 0;
    public Collection $column_selects;
    public array $input_columns = ['id', 'number', 'name', 'address', 'latitude', 'longitude', 'comment'];
    public array $select_columns = ['place_type_id', 'place_type_group_id', 'purpose_id', 'territory_id', 'state_id'];
    public array $date_columns = ['created_at'];

    public ?string $begin_date = null;
    public ?string $end_date = null;

    public string $application_type;

    public function updatedRegionId(): void
    {
        $this->chosen_regions = [];
    }

    public function updatedAreaId(): void
    {
        $this->chosen_areas = [];
    }

    public function updatedColumnName(): void
    {
        $repository = new PositionRepository();

        $this->search = '';
        $this->column_select_id = 0;
        $this->begin_date = null;
        $this->end_date = null;
        $this->column_selects = match ($this->column_name) {
            'place_type_id' => $repository->getPlaceTypes(),
            'place_type_group_id' => $repository->getPlaceTypeGroups(),
            'purpose_id' => $repository->getPurposes(),
            'territory_id' => $repository->getTerritories(),
            'state_id' => $repository->getStates(),
            default => new Collection()
        };
    }
}
