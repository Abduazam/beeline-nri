<?php

namespace App\Services\BaseStations\BaseStationPowerSupply;

use App\Models\BaseStations\BaseStationPowerSupplies\BaseStationPowerSupply;

class CreateService
{
    public function create($applicationId, array $data): void
    {
        foreach ($data as $power_supply) {
            $allNull = array_reduce($power_supply, function ($carry, $value) {
                return $carry && ($value === null);
            }, true);

            if (!$allNull) {
                $power_supply['base_station_application_id'] = $applicationId;
                BaseStationPowerSupply::create($power_supply);
            }
        }
    }
}
