<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

trait ActionOnRadioModule
{
    protected array $radioModule = [
        'rru_number' => null,
        'rru_type_id' => null,
        'sectors' => null,
        'control_module_id' => null,
        'transceivers' => null,
        'optical_cable_id' => null,
        'optical_cable_number' => null,
    ];

    public function addRadioModule(): void
    {
        $num = 1 + count( $this->data['radio_modules']);

        $this->radioModule['rru_number'] = "RRU_" . $num;
        $this->radioModule['optical_cable_number'] = 0;

        $this->data['radio_modules'][] = $this->radioModule;
    }

    public function removeRadioModule($index): void
    {
        unset($this->data["radio_modules"][$index]);
    }
}
