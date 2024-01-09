<?php

namespace App\Services\BaseStations\BaseStationRCU;

use App\Models\BaseStations\BaseStationAntennaControlUnits\BaseStationAntennaControlUnit;

class CreateService
{
    public function create($applicationId, array $data): void
    {
        foreach ($data as $rcu) {
            $rcu['base_station_application_id'] = $applicationId;
            BaseStationAntennaControlUnit::create($rcu);
        }
    }
}
