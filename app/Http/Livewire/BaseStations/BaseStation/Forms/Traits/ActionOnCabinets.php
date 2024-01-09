<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

trait ActionOnCabinets
{
    protected array $cabinet = [
        'bts_type_id' => null,
        'bts_number' => null,
        'bs_name_nms' => null,
        'transceivers_number' => null,
        'e1_threads_number' => null,
        'mb' => null,
    ];

    public function addCabinet(): void
    {
        $this->data['cabinets'][] = $this->cabinet;
    }

    public function removeCabinet($id): void
    {
        unset($this->data["cabinets"][$id]);
    }
}
