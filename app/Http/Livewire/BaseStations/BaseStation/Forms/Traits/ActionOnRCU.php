<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

use App\Models\Data\AntennaType\AntennaType;
use App\Models\Data\RruTypes\RruType;

trait ActionOnRCU
{
    protected array $rcu = [
        'rru_control' => null,
        'antenna_id' => null,
        'antenna_type' => null,
        'sectors' => null,
        'number_mcu_rru' => null,
        'type_mcu_rru' => null,
        'motor_id' => null,
        'i_cable_id' => null,
        'o_cable_id' => null,
    ];

    public function addRcu(): void
    {
        $this->data['rcus'][] = $this->rcu;
    }

    public function removeRcu($index): void
    {
        unset($this->data['rcus'][$index]);
    }

    public function getAntennaInfo($index): void
    {
        $antenna_id = $this->data['rcus'][$index]['antenna_id'];
        $antenna_type = $this->data['antennas'][$antenna_id]['antenna_type_id'];
        $antenna = AntennaType::findOrFail($antenna_type);

        $this->data['rcus'][$index]['antenna_type'] = $antenna->model;
        $this->data['rcus'][$index]['sectors'] = $this->data['antennas'][$antenna_id]['sectors'];
    }

    public function getRadioModuleInfo($index): void
    {
        $number_mcu_rru_id = $this->data['rcus'][$index]['number_mcu_rru'];
        $rru_type_id = $this->data['radio_modules'][$number_mcu_rru_id]['rru_type_id'];
        $rru = RruType::findOrFail($rru_type_id);

        $this->data['rcus'][$index]['type_mcu_rru'] = $rru->model;
    }
}
