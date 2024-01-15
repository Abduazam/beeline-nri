<?php

namespace App\Services\Imports\Positions;

use App\Models\Positions\Position\Position;

class PositionImportService
{
    protected string $source = "NRI (Network Resource Inventory for mobile domain)";
    protected int $company_id = 1;
    protected int $place_type_id = 1;
    protected int $place_type_group_id = 1;
    protected int $purpose_id = 1;
    protected int $state_id = 5;

    public function __construct(
        protected $position_number,
        protected int $region_id,
        protected string $name,
        protected string $address,
        protected int $coordinate_id,
        protected string $latitude,
        protected string $longitude,
    ) { }

    public function create(): Position
    {
        Position::$skipBoot = true;

        return Position::firstOrCreate(
            ['number' => $this->position_number],
            [
                'number' => $this->position_number,
                'source' => $this->source,
                'company_id' => $this->company_id,
                'place_type_id' => $this->place_type_id,
                'place_type_group_id' => $this->place_type_group_id,
                'purpose_id' => $this->purpose_id,
                'region_id' => $this->region_id,
                'name' => $this->name,
                'territory_id' => $this->region_id,
                'address' => $this->address,
                'coordinate_id' => $this->coordinate_id,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'state_id' => $this->state_id,
            ]
        );
    }
}
