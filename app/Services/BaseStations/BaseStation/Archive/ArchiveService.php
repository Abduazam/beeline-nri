<?php

namespace App\Services\BaseStations\BaseStation\Archive;

use App\Models\BaseStations\BaseStation\BaseStation;
use Illuminate\Support\Facades\DB;

class ArchiveService
{

    public function archive(array $data)
    {
        return DB::transaction(function () use ($data) {
            $bs = BaseStation::create([
                'year' => $data['year'],
                'position_id' => $data['position_id']
            ]);

            /**
             * Base Station application
             */
            $application = (new \App\Services\BaseStations\BaseStationApplication\CreateService())->create($bs->id, $data['application_type_id']);

            /**
             * Base Station diapasons
             */
            (new \App\Services\BaseStations\BaseStationDiapasons\CreateService())->create($application->id, $data['data']['diapasons']['chosen_diapasons']);

            /**
             * Base Station diapason info
             */
            (new \App\Services\BaseStations\BaseStationDiapasonInfo\CreateService())->create($application->id, $data['data']['diapasons']['diapason_info']);

            /**
             * Base Station structure
             */
            (new \App\Services\BaseStations\BaseStationStructure\CreateService())->create($application->id, $data['data']['structures']);

            /**
             * Base Station ars
             */
            (new \App\Services\BaseStations\BaseStationARS\CreateService())->create($application->id, $data['data']['ars']);

            /**
             * Base Station power supplies
             */
            (new \App\Services\BaseStations\BaseStationPowerSupply\CreateService())->create($application->id, $data['data']['power_supplies']);

            /**
             * Base Station cabinets
             */
            $cabinetIds = (new \App\Services\BaseStations\BaseStationCabinets\CreateService())->create($application->id, $data['data']['cabinets']);

            /**
             * Base Station e_nodes
             */
            $eNodes = (new \App\Services\BaseStations\BaseStationENode\CreateService())->create($application->id, $data['data']['e_nodes']);

            /**
             * Base Station control_modules
             */
            $controlModuleIds = (new \App\Services\BaseStations\BaseStationControlModules\CreateService())->create($application->id, $cabinetIds, $data['data']['control_modules']);

            /**
             * Base Station radio_modules
             */
            $radioModuleIds = (new \App\Services\BaseStations\BaseStationRadioModules\CreateService())->create($application->id, $controlModuleIds, $data['data']['radio_modules']);

            /**
             * Base Station sectors
             */
            (new \App\Services\BaseStations\BaseStationSectors\CreateService())->create($application->id, $data['data']['sectors'], $radioModuleIds, $cabinetIds, $eNodes);

            /**
             * Base Station antenna equipments
             */
            (new \App\Services\BaseStations\BaseStationAntenna\CreateService())->create($application->id, $data['data']['antennas']);

            /**
             * Base Station transport network
             */
            (new \App\Services\BaseStations\BaseStationTransport\CreateService())->create($application->id, $data['data']['transports']);
        });
    }
}
