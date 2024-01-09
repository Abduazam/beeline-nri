<?php

namespace App\Services\BaseStations\BaseStationRadioModules;

use App\Models\BaseStations\BaseStationRadioModules\BaseStationRadioModule;

class CreateService
{
    public function create($applicationId, array $cModuleIds, array $data): array
    {
        $ids = [];

        foreach ($data as $index => $radioModule) {
            $cMIndex = intval($radioModule['control_module_id']);

            $radioModule['base_station_application_id'] = $applicationId;
            $bsrm = BaseStationRadioModule::create($radioModule);

            $ids[$index] = $bsrm->id;
        }

        return $ids;
    }
}
