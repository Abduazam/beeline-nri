<?php

namespace App\Services\BaseStations\BaseStationTransport;

use App\Models\BaseStations\BaseStationTransportNetworks\BaseStationTransportNetwork;

class CreateService
{
    public function create($applicationId, array $data): void
    {
        foreach ($data['networks'] as $network) {
            $network['base_station_application_id'] = $applicationId;
            $network['link_to_prts'] = $data['link_to_prts'];
            $network['responsible_user_id'] = $data['responsible_user_id'];
            $network['gfc_node'] = $data['gfc_node'];
            $network['correct_id'] = $data['correct_id'];

            BaseStationTransportNetwork::create($network);
        }
    }
}
