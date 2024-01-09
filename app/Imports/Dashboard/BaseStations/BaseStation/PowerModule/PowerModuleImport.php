<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\PowerModule;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationPowerModules\BaseStationPowerModule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PowerModuleImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?BaseStationPowerModule
    {
        $id_project = intval($row['id_proekta']);
        $bs_app = BaseStationApplication::find($id_project);
        if ($bs_app) {
            return new BaseStationPowerModule([
                'base_station_application_id' => $bs_app->id,
                'mcu_type' => $row['tip_mcu'],
                'mcu_number' => $row['nomer_mcu'],
            ]);
        } else {
            return null;
        }
    }
}
