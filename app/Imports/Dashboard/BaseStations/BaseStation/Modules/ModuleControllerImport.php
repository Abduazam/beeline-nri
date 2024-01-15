<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\Modules;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationControlModules\BaseStationControlModule;
use App\Models\Data\MuTypes\MuType;
use App\Models\Data\RoomType\RoomType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModuleControllerImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?BaseStationControlModule
    {
        $id_project = intval($row['id_proekta']);
        $bs_app = BaseStationApplication::find($id_project);
        if ($bs_app) {
            $mu_type = MuType::firstOrCreate(
                ['title' => $row['tip_mu']],
                [
                    'title' => $row['tip_mu'],
                    'model' => $row['tip_mu']
                ]
            );

            $room_type = null;
            if (!empty($row['raspolozenie_mu'])) {
                $room_type = RoomType::firstOrCreate(
                    ['title' => $row['raspolozenie_mu']],
                    [
                        'title' => $row['raspolozenie_mu']
                    ]
                );
            }

            return new BaseStationControlModule([
                'base_station_application_id' => $bs_app->id,
                'mu_type_id' => $mu_type->id,
                'mu_number' => $row['nomer_mu'],
                'room_type_id' => $room_type?->id,
                'cabinet_id' => $row['nomer_bts'],
            ]);
        } else {
            return null;
        }
    }
}
