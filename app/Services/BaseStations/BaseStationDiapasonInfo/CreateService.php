<?php

namespace App\Services\BaseStations\BaseStationDiapasonInfo;

use App\Models\BaseStations\BaseStationDiapasons\BaseStationDiapasonInfo;

class CreateService
{
    public function create($applicationId, array $data): void
    {
        BaseStationDiapasonInfo::create([
            'base_station_application_id' => $applicationId,
            'room_type_id' => $data['room_type_id'],
            'hardware_room_id' => $data['hardware_room_id'],
            'hardware_owner_id' => $data['hardware_owner_id'],
            'location_antenna_id' => $data['location_antenna_id'],
            'height_afu' => $data['height_afu'],
            'general_contractor_id' => $data['general_contractor']['id'],
            'type_ka' => $data['type_ka'],
            'k_a_id' => $data['k_a_id'],
        ]);
    }
}
