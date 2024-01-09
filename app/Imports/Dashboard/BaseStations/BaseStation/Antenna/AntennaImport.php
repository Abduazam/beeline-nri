<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\Antenna;

use App\Models\BaseStations\BaseStationAntennaEquipments\BaseStationAntennaEquipment;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\AntennaReception\AntennaReception;
use App\Models\Data\AntennaTransmission\AntennaTransmission;
use App\Models\Data\AntennaType\AntennaType;
use App\Models\Data\Feeder\Feeder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AntennaImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?BaseStationAntennaEquipment
    {
        $id_project = intval($row['id_proekta']);
        $bs_app = BaseStationApplication::find($id_project);
        if ($bs_app) {
            $middleIndex = ceil(strlen($row['diagramma_napravlennosti']) / 2);
            $leftHalf = substr($row['diagramma_napravlennosti'], 0, $middleIndex);
            $rightHalf = substr($row['diagramma_napravlennosti'], $middleIndex);

            $antennaType = null;
            if (!empty($row['tip_antenny'])) {
                $antennaType = AntennaType::firstOrCreate(
                    ['model' => $row['tip_antenny']],
                    [
                        'title' => "Антенна",
                        'model' => $row['tip_antenny'],
                        'diapasons' => $row['diapazon'],
                        'horizontal_diagram' => $leftHalf,
                        'vertical_diagram' => $rightHalf,
                        'ku_antenna' => $row['ku_antenny'],
                        'electrical_tilt' => $row['elektr_naklon'],
                        'mechanical_tilt' => $row['mexanic_naklon'],
                    ]
                );
            }

            $aReception = null;
            if (!empty($row['priem'])) {
                $aReception = AntennaReception::firstOrCreate(
                    ['title' => $row['priem']],
                    ['title' => $row['priem']],
                );
            }

            $aTransmission = null;
            if (!empty($row['peredaca'])) {
                $aTransmission = AntennaTransmission::firstOrCreate(
                    ['title' => $row['peredaca']],
                    ['title' => $row['peredaca']],
                );
            }

            $feeder = null;
            if (!empty($row['tip_fidera'])) {
                $feeder = Feeder::firstOrCreate(
                    ['title' => $row['tip_fidera']],
                    ['title' => $row['tip_fidera']],
                );
            }

            return new BaseStationAntennaEquipment([
                'base_station_application_id' => $bs_app->id,
                'sectors' => $row['sektora'],
                'sector_number' => $row['nomer_v_sektore'],
                'antenna_type_id' => $antennaType?->id,
                'azimuth' => $row['azimut'],
                'suspension_height' => $row['vysota_podvesa_antenny'],
                'diapasons' => $row['diapazon'],
                'direction_diagram' => $leftHalf,
                'direction_diagram_2' => $rightHalf,
                'ku_antennas' => $row['ku_antenny'],
                'electrical_tilt' => $row['elektr_naklon'],
                'mechanical_tilt' => $row['mexanic_naklon'],
                'sum_tilts' => $row['summ_naklon'],
                'antenna_reception_id' => $aReception?->id,
                'antenna_transmission_id' => $aTransmission?->id,
                'feeder_id' => $feeder?->id,
                'feeder_length' => $row['dlina_fidera'],
            ]);
        } else {
            return null;
        }
    }
}
