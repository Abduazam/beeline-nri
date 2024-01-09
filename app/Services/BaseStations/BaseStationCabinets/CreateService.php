<?php

namespace App\Services\BaseStations\BaseStationCabinets;

use App\Models\BaseStations\BaseStationCabinets\BaseStationCabinet;

class CreateService
{
    public function create($applicationId, array $data): array
    {
        $cabinetIds = [];

        foreach ($data as $index => $cabinet) {
            $cabinet['base_station_application_id'] = $applicationId;
            $bsc = BaseStationCabinet::create($cabinet);

            $cabinetIds[$index] = $bsc->id;
        }

        return $cabinetIds;
    }
}
