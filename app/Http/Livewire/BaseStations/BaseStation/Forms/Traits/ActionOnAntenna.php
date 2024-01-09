<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

trait ActionOnAntenna
{
    protected array $antenna = [
        'sectors' => null,
        'sector_number' => null,
        'antenna_type_id' => null,
        'meta_article' => null,
        'top_antenna' => null,
        'azimuth' => null,
        'suspension_height' => null,
        'diapasons' => null,
        'direction_diagram' => null,
        'direction_diagram_2' => null,
        'ku_antennas' => null,
        'bisector' => null,
        'electrical_tilt' => null,
        'mechanical_tilt' => null,
        'sum_tilts' => null,
        'antenna_reception_id' => null,
        'antenna_transmission_id' => null,
        'feeder_id' => null,
        'feeder_length' => null,
        'latitude' => null,
        'longitude' => null,
    ];

    public function addAntenna(): void
    {
        $num = 1 + count($this->data['antennas']);

        $this->antenna['sector_number'] = $num;
        $this->data['antennas'][] = $this->antenna;
    }

    public function removeAntenna($index): void
    {
        unset($this->data['antennas'][$index]);
    }
}
