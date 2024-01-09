<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\OCables\OCable;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseOCableType extends Component
{
    public int $index = 0;

    use WithSearing, WithPaginating;

    public int|null $o_cable_id = null;

    public string|null $o_cable_model = null;

    public function clickOCable(int $id): void
    {
        $this->o_cable_id = $id;
    }

    public function choose(): void
    {
        $motor = OCable::findOrFail($this->o_cable_id);

        $this->o_cable_model = $motor->model;

        $this->emit('oCableChosen', [
            'index' => $this->index,
            'o_cable_id' => $this->o_cable_id,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-o-cable-type', [
            'ocables' => OCable::all(),
            'key' => $this->index,
        ]);
    }
}
