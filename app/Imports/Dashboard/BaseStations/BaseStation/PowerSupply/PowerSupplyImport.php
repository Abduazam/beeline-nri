<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\PowerSupply;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationPowerSupplies\BaseStationPowerSupply;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PowerSupplyImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?BaseStationPowerSupply
    {
        $id_project = intval($row['id_proekta']);
        $bs_app = BaseStationApplication::find($id_project);
        if ($bs_app) {
            return new BaseStationPowerSupply([
                'base_station_application_id' => $bs_app->id,
            ]);
        } else {
            return null;
        }
    }
}
