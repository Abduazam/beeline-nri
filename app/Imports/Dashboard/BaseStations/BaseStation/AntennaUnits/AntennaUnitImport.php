<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\AntennaUnits;

use App\Models\BaseStations\BaseStationAntennaControlUnits\BaseStationAntennaControlUnit;
use App\Models\Data\AntennaType\AntennaType;
use App\Models\Data\ICables\ICable;
use App\Models\Data\Motors\Motor;
use App\Models\Data\OCables\OCable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AntennaUnitImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?BaseStationAntennaControlUnit
    {
        $id_project = intval($row['id_proekta']);
        $bs_app = BaseStationAntennaControlUnit::find($id_project);
        if ($bs_app) {
            $iCable = ! is_null($row['tip_kabelia_i']) ? ICable::firstOrCreate(['title' => $row['tip_kabelia_i']], ['title' => $row['tip_kabelia_i']]) : null;
            $oCable = ! is_null($row['tip_kabelia_o']) ? OCable::firstOrCreate(['title' => $row['tip_kabelia_o']], ['title' => $row['tip_kabelia_o']]) : null;
            $antennaType = ! is_null($row['tip_antenny']) ? AntennaType::firstOrCreate(['model' => $row['tip_antenny']], [
                'title' => 'Антенна',
                'model' => $row['tip_antenny'],
            ]) : null;

            $motor = ! is_null($row['tip_motora']) ? Motor::firstOrCreate(['title' => $row['tip_motora']], ['title' => $row['tip_motora']]) : null;

            return new BaseStationAntennaControlUnit([
                'base_station_application_id' => $bs_app->id,
                'rru_control' => true,
                'antenna_id' => $antennaType?->id,
                'antenna_type' => $row['tip_antenny'],
                'sectors' => $row['sektora'],
                'number_mcu_rru' => $row['nomer_mcurru'],
                'motor_id' => $motor?->id,
                'i_cable_id' => $iCable?->id,
                'o_cable_id' => $oCable?->id,
            ]);
        } else {
            return null;
        }
    }
}
