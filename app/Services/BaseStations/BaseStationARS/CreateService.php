<?php

namespace App\Services\BaseStations\BaseStationARS;

use App\Models\BaseStations\BaseStationARS\BaseStationARS;

class CreateService
{
    public function create($applicationId, array $data): void
    {
        $allNull = array_reduce($data, function ($carry, $value) {
            return $carry && ($value === null);
        }, true);

        if (!$allNull) {
            $data['base_station_application_id'] = $applicationId;
            BaseStationARS::create($data);
        }
    }
}
