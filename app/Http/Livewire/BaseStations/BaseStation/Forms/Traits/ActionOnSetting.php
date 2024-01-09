<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

use App\Helpers\Helper;
use App\Models\Data\BtsTypes\BtsType;
use App\Models\Data\Controllers\Controller;
use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Models\Positions\Position\Position;

trait ActionOnSetting
{
    public function setPosition(Position $position, Helper $helper): void
    {
        $this->position_id = $position->id;
        $this->position = $position;

        $latitude = $helper->decimalToDegree($position->latitude);
        $explodedLatitude = explode(' ', $latitude);

        $longitude = $helper->decimalToDegree($position->longitude);
        $explodedLongitude = explode(' ', $longitude);

        $this->degree_values = [
            'latitude' => [
                'degree' => $explodedLatitude[0],
                'minute' => $explodedLatitude[1],
                'second' => $explodedLatitude[2],
            ],
            'longitude' => [
                'degree' => $explodedLongitude[0],
                'minute' => $explodedLongitude[1],
                'second' => $explodedLongitude[2],
            ]
        ];
    }

    public function setController(array $data): void
    {
        $controller = Controller::findOrFail($data['controller_id']);

        $this->data["diapasons"]["chosen_diapasons"][$data['diapason_id']]['controller']['id'] = $data['controller_id'];
        $this->data["diapasons"]["chosen_diapasons"][$data['diapason_id']]['controller']['address'] = $controller->address;
    }

    public function setGeneralContractor(int $gc_id): void
    {
        $gc = GeneralContractor::findOrFail($gc_id);
        $this->data['diapasons']['diapason_info']['general_contractor']['id'] = $gc->id;
        $this->data['diapasons']['diapason_info']['general_contractor']['name'] = $gc->title;
    }

    public function setCabinetBtsType(array $data): void
    {
        $num = 1 + $data['index'];

        $this->data["cabinets"][$data['index']]['bts_type_id'] = $data['bts_type_id'];
        $this->data["cabinets"][$data['index']]['bts_number'] = "BTS_" . $num;
        $this->data["cabinets"][$data['index']]['mb'] = 0;
    }

    public function setControlModuleMuType(array $data): void
    {
        $num = 1 + $data['index'];

        $this->data["control_modules"][$data['index']]['mu_type_id'] = $data['mu_type_id'];
        $this->data["control_modules"][$data['index']]['mu_number'] = "MU_" . $num;
    }

    public function setRadioModuleRruType(array $data): void
    {
         $this->data['radio_modules'][$data['index']]['rru_type_id'] = $data['rru_type_id'];
    }

    public function setAntennaSectors(array $data): void
    {
        $this->data['antennas'][$data['index']]['sectors'] = $data['sectors_name'];
    }

    public function setAntennaType(array $data): void
    {
        $this->data['antennas'][$data['index']]['antenna_type_id'] = $data['antenna_type']['id'];
        $this->data['antennas'][$data['index']]['diapasons'] = $data['antenna_type']['diapasons'];
        $this->data['antennas'][$data['index']]['direction_diagram'] = $data['antenna_type']['horizontal_diagram'];
        $this->data['antennas'][$data['index']]['direction_diagram_2'] = $data['antenna_type']['vertical_diagram'];
        $this->data['antennas'][$data['index']]['ku_antennas'] = $data['antenna_type']['ku_antenna'];
        $this->data['antennas'][$data['index']]['electrical_tilt'] = $data['antenna_type']['electrical_tilt'];
        $this->data['antennas'][$data['index']]['mechanical_tilt'] = $data['antenna_type']['mechanical_tilt'];
    }

    public function setICable(array $data): void
    {
        $this->data['rcus'][$data['index']]['i_cable_id'] = $data['i_cable_id'];
    }

    public function setOCable(array $data): void
    {
        $this->data['rcus'][$data['index']]['o_cable_id'] = $data['o_cable_id'];
    }

    public function setEquipmentType(array $data): void
    {
        $this->data['transports']['networks'][$data['index']]['equipment_type_id'] = $data['equipment_type_id'];
    }

    public function setNetworkPositionNumber(array $data): void
    {
        $this->data['transports']['networks'][$data['index']]['response_title'] = $data['position_name'];
        $this->data['transports']['networks'][$data['index']]['item_code'] = $data['position_number'];
        $this->data['transports']['networks'][$data['index']]['response_latitude'] = $data['latitude'];
        $this->data['transports']['networks'][$data['index']]['response_longitude'] = $data['longitude'];
    }
}
