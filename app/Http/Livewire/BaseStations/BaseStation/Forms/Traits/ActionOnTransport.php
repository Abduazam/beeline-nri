<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

trait ActionOnTransport
{
    protected array $transport = [
        'vehicle_type_id' => null,
        'position_set_id' => null,
        'line_status_id' => null,
        'line_number' => null,
        'landowner' => null,
        'equipment_type_id' => null,
        'interface' => null,
        'tdm_band' => null,
        'ip_band' => null,
        'generalization_frequency' => null,
        'speed' => null,
        'antenna_diameter_in_ta' => null,
        'antenna_diameter_in_ta_2' => null,
        'suspension_height_in_ta' => null,
        'suspension_height_in_ta_2' => null,
        'power' => null,
        'azimuth_a' => null,
        'reservation' => null,
        'node_code' => null,
        'response_title' => null,
        'item_code' => null,
        'response_kit' => "новые комплект",
        'response_latitude' => null,
        'response_longitude' => null,
        'antenna_diameter_in_tb' => null,
        'antenna_diameter_in_tb_2' => null,
        'suspension_height_in_tb' => null,
        'suspension_height_in_tb_2' => null,
        'azimuth_b' => null,
        'change_date' => null,
        'range' => null,
    ];

    public function addTransport(): void
    {
        $this->data['transports']['networks'][] = $this->transport;
    }

    public function removeTransport($index): void
    {
        unset($this->data['transports']['networks'][$index]);
    }
}
