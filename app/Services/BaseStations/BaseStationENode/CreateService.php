<?php

namespace App\Services\BaseStations\BaseStationENode;

use App\Models\BaseStations\BaseStationENodeB\BaseStationENodeB;

class CreateService
{
    public function create($applicationId, array $data): array
    {
        $ids = [];

        foreach ($data as $index => $e_node) {
            $allNull = array_reduce($e_node, function ($carry, $value) {
                return $carry && ($value === null);
            }, true);

            if (!$allNull) {
                $e_node['base_station_application_id'] = $applicationId;
                $e_node['diapason_id'] = $e_node['diapason']['id'];
                unset($e_node['diapason']);
                $en = BaseStationENodeB::create($e_node);

                $ids[$index] = $en->id;
            }
        }

        return $ids;
    }
}
