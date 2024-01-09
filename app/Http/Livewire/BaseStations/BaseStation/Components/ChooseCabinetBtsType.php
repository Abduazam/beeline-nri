<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\BtsTypes\BtsType;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseCabinetBtsType extends Component
{
    public int $index = 0;

    use WithSearing, WithPaginating;

    public int|null $cabinet_id = null;

    public string|null $bts_type_model = null;

    public function clickCabinet(int $id): void
    {
        $this->cabinet_id = $id;
    }

    public function choose(): void
    {
        $bts_type = BtsType::findOrFail($this->cabinet_id);

        $this->bts_type_model = $bts_type->model;

        $this->emit('cabinetBtsTypeChosen', [
            'index' => $this->index,
            'bts_type_id' => $this->cabinet_id,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-cabinet-bts-type', [
            'cabinets' => BtsType::all(),
            'key' => $this->index,
        ]);
    }
}
