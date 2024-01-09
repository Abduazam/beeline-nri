<?php

namespace App\Services\Imports\BaseStations;

use App\Models\BaseStations\BaseStation\BaseStation;

class BaseStationImportService
{
    public function __construct(
        protected int $year,
        protected int $position_id,
    ) { }

    public function create()
    {
        return BaseStation::firstOrCreate(
            ['position_id' => $this->position_id],
            [
                'year' => $this->year,
                'position_id' => $this->position_id,
            ]
        );
    }
}
