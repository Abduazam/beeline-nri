<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\Sectors;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationSectors\BaseStationSector;
use App\Models\Data\Diapason\Diapason;
use App\Models\Data\DuplexFilter\DuplexFilter;
use App\Models\Data\Technology\Technology;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SectorImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?BaseStationSector
    {
        $id_project = intval($row['id_proekta']);
        $bs_app = BaseStationApplication::find($id_project);
        if ($bs_app) {
            $diapason = null;
            if (!empty($row['diapazon_sektora'])) {
                $techDia = explode(" ", $row['diapazon_sektora']);

                $tech = Technology::firstOrCreate(
                    ['name' => $techDia[0]],
                    ['code' => 15, 'name' => $techDia[0]],
                );

                $lastElement = end($techDia);

                $diapason = Diapason::firstOrCreate(
                    ['technology_id' => $tech->id, 'band' => $lastElement],
                    ['technology_id' => $tech->id, 'band' => $lastElement]
                );
            }


            $duplex_filter_id = null;
            if (!empty($row['diplekser_txrx_poliarizacii'])) {
                $duplexFilter = DuplexFilter::firstOrCreate(
                    ['title' => $row['diplekser_txrx_poliarizacii']],
                    ['title' => $row['diplekser_txrx_poliarizacii']]
                );

                $duplex_filter_id = $duplexFilter->id;
            }

            return new BaseStationSector([
                'base_station_application_id' => $bs_app->id,
                'sector_number' => $row['nomer_sektora'],
                'cell_id' => $row['cellid'],
                'diapason_id' => $diapason?->id,
                'title' => $row['naimenovanie'],
                'transceivers' => $row['transivery'],
                'antenna_number' => $row['kol_vo_antenn_v_sektore'],
                'azimuth' => floatval($row['azimut_sektora']),
                'duplex_filter_id' => $duplex_filter_id,
                'duplex_filter_number' => !empty($row['kolicestvo_diplekserov']) ? $row['kolicestvo_diplekserov'] : null,
            ]);
        } else {
            return null;
        }
    }
}
