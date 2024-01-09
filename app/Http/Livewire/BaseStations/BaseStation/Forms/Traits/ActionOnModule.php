<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

trait ActionOnModule
{
    protected array $controlModule = [
        'mu_type_id' => null,
        'mu_number' => null,
        'room_type_id' => null,
        'cabinet_id' => null,
        'bs_name_nms' => null,
    ];

    public function addModule(): void
    {
        $this->data['control_modules'][] = $this->controlModule;
    }

    public function removeModule($index): void
    {
        unset($this->data["control_modules"][$index]);
    }
}
