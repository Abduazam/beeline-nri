<?php

namespace App\Services\BaseStations\BaseStationAntenna;

use App\Models\BaseStations\BaseStationAntennaEquipments\BaseStationAntennaEquipment;

class CreateService
{
    public function create($applicationId, array $data): void
    {
        foreach ($data as $antenna) {
            $antenna['base_station_application_id'] = $applicationId;
            BaseStationAntennaEquipment::create($antenna);
        }
    }
}
