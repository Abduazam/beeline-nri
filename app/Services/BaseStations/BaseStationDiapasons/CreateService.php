<?php

namespace App\Services\BaseStations\BaseStationDiapasons;

use App\Models\BaseStations\BaseStationDiapasons\BaseStationDiapason;

class CreateService
{
    public function create($applicationId, $data): void
    {
        foreach ($data as $diapasonId => $value) {
            BaseStationDiapason::create([
                'number' => $value['number'],
                'base_station_application_id' => $applicationId,
                'diapason_id' => $diapasonId,
                'controller_id' => $value['controller']['id'],
                'is_new' => $value['controller']['is_new'],
            ]);
        }
    }
}
