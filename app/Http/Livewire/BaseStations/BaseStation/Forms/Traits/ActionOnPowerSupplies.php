<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

trait ActionOnPowerSupplies
{
    protected array $power_supply = [
        'd' => null,
        'purpose' => null,
        'ip_type_id' => null,
        'ip_manufacturer_id' => null,
        'battery_type_id' => null,
        'power' => null,
        'voltage' => null,
    ];

    public function addPowerSupply(): void
    {
        $this->data['power_supplies'][] = $this->power_supply;
    }

    public function removePowerSupply($id): void
    {
        unset($this->data['power_supplies'][$id]);
    }
}
