<?php

namespace App\Services\BaseStations\BaseStationApplication;

use App\Models\Data\Position\Status\Status;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;

class CreateService
{
    public function create($bs_id, $application_type_id): BaseStationApplication
    {
        return BaseStationApplication::create([
            'base_station_id' => $bs_id,
            'application_type_id' => $application_type_id,
            'user_id' => auth()->user()->id,
            'status_id' => (Status::where('aim', 'registered')->first())->id,
        ]);
    }
}
