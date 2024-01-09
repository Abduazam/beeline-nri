<?php

namespace App\Services\BaseStations\BaseStationControlModules;

use App\Models\BaseStations\BaseStationControlModules\BaseStationControlModule;

class CreateService
{
    public function create($applicationId, array $cabinetIds, array $data): array
    {
        $ids = [];

        foreach ($data as $index => $controlModule) {
            $cIndex = intval($controlModule['cabinet_id']);

            $controlModule['base_station_application_id'] = $applicationId;
            $bscm = BaseStationControlModule::create($controlModule);

            $ids[$index] = $bscm->id;
        }

        return $ids;
    }
}
