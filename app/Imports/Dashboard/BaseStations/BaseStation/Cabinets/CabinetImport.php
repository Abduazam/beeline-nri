<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\Cabinets;

use App\Models\BaseStations\BaseStationCabinets\BaseStationCabinet;
use App\Models\Data\BtsTypes\BtsType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;

class CabinetImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?BaseStationCabinet
    {
        $id_project = intval($row['id_proekta']);
        $bs_app = BaseStationApplication::find($id_project);
        if ($bs_app) {
            $bts_type = null;
            if (!empty($row['tip_bts'])) {
                $bts_type = BtsType::firstOrCreate(
                    ['title' => $row['tip_bts']],
                    [
                        'title' => $row['tip_bts'],
                        'model' => $row['tip_bts'],
                        'distribution' => "N",
                    ]
                );
            }

            return new BaseStationCabinet([
                'base_station_application_id' => $bs_app->id,
                'bts_type_id' => $bts_type?->id,
                'bts_number' => $row['nomer_bts'],
            ]);
        } else {
            return null;
        }
    }
}
