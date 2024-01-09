<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\EquipmentType\EquipmentType;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseNetworkEquipmentType extends Component
{
    public $index = 0;

    use WithSearing, WithPaginating;

    public int|null $equipment_type_id = null;

    public string|null $equipment_model = null;

    public function clickEquipment(int $id): void
    {
        $this->equipment_type_id = $id;
    }

    public function choose(): void
    {
        $equipmentType = EquipmentType::findOrFail($this->equipment_type_id);

        $this->equipment_model = $equipmentType->designation;

        $this->emit('equipmentTypeChosen', [
            'index' => $this->index,
            'equipment_type_id' => $this->equipment_type_id,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-network-equipment-type', [
            'equipments' => EquipmentType::all(),
            'key' => $this->index,
        ]);
    }
}
