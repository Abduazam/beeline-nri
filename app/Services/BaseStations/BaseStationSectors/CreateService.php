<?php

namespace App\Services\BaseStations\BaseStationSectors;

use App\Models\BaseStations\BaseStationSectors\BaseStationSector;

class CreateService
{
    public function create($applicationId, array $data, array $rrss, array $btss, array $enodes): void
    {
        foreach ($data as $sector) {
            $sector['base_station_application_id'] = $applicationId;

            if (!is_null($sector['e_node_b_id'])) {
                $bts_id = intval($sector['e_node_b_id']);
                $sector['e_node_b_id'] = $enodes[$bts_id];
            }

            BaseStationSector::create($sector);
        }
    }
}
