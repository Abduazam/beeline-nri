<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

trait ActionOnSector
{
    protected array $sector = [
        'rssh' => false,
        'sector_number' => null,
        'cell_id' => null,
        'diapason_id' => null,
        'title' => null,
        'e_node_b_id' => null,
        'transceivers' => null,
        'drate_transceivers' => null,
        'bts_id' => null,
        'rru_id' => null,
        'antenna_number' => null,
        'azimuth' => null,
        'metro' => null,
        'lna_availability' => null,
        'lna_type' => null,
        'lna_number' => null,
        'duplex_filter_id' => null,
        'duplex_filter_number' => null,
    ];

    public function addSector(): void
    {
        $num = 1 + count($this->data['sectors']);
        $this->sector['title'] = "D" . $num;
        $this->data['sectors'][] = $this->sector;
    }

    public function removeSector($index): void
    {
        unset($this->data["sectors"][$index]);
    }
}
