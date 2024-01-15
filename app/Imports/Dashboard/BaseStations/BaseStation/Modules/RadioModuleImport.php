<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\Modules;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationRadioModules\BaseStationRadioModule;
use App\Models\Data\OpticalCable\OpticalCable;
use App\Models\Data\RruTypes\RruType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RadioModuleImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?BaseStationRadioModule
    {
        $id_project = intval($row['id_proekta']);
        $bs_app = BaseStationApplication::find($id_project);
        if ($bs_app) {
            $rru_type = RruType::firstOrCreate(
                ['title' => $row['tip_rru']],
                [
                    'title' => $row['tip_rru'],
                    'model' => $row['tip_rru']
                ]
            );

            $optical_cable = OpticalCable::firstOrCreate(
                ['title' => $row['tip_opticeskogo_kabelia']],
                [
                    'title' => $row['tip_opticeskogo_kabelia']
                ]
            );

            return new BaseStationRadioModule([
                'base_station_application_id' => $bs_app->id,
                'rru_number' => $row['nomer_rru'],
                'rru_type_id' => $rru_type->id,
                'sectors' => $row['sektora'],
                'control_module_id' => $row['nomer_mu'],
                'transceivers' => intval($row['transivery']),
                'optical_cable_id' => $optical_cable->id,
                'optical_cable_number' => intval($row['kolicestvo_opticeskix_kabelei']),
            ]);
        } else {
            return null;
        }
    }
}
