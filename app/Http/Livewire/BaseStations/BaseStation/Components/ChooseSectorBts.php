<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use Livewire\Component;
use Illuminate\View\View;

class ChooseSectorBts extends Component
{
    public int $key = 0;
    public array $btsArray;

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-sector-bts');
    }
}
