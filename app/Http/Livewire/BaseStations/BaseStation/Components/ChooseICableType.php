<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\ICables\ICable;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseICableType extends Component
{
    public int $index = 0;

    use WithSearing, WithPaginating;

    public int|null $i_cable_id = null;

    public string|null $i_cable_model = null;

    public function clickICable(int $id): void
    {
        $this->i_cable_id = $id;
    }

    public function choose(): void
    {
        $motor = ICable::findOrFail($this->i_cable_id);

        $this->i_cable_model = $motor->model;

        $this->emit('iCableChosen', [
            'index' => $this->index,
            'i_cable_id' => $this->i_cable_id,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-i-cable-type',  [
            'icables' => ICable::all(),
            'key' => $this->index,
        ]);
    }
}
