<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\AntennaType\AntennaType;
use App\Models\Data\Controllers\Controller;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseAntennaType extends Component
{
    use WithSearing, WithPaginating;

    public int $index = 0;

    public int|null $antenna_type_id = null;
    public string|null $antenna_type_name = null;

    public function clickAntennaType(int $id): void
    {
        $this->antenna_type_id = $id;
    }

    public function choose(): void
    {
        $antennaType = AntennaType::findOrFail($this->antenna_type_id);

        $this->antenna_type_name = $antennaType->model;

        $this->emit('antennaTypeChosen', [
            'index' => $this->index,
            'antenna_type' => $antennaType,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-antenna-type', [
            'key' => $this->index,
            'antenna_types' => AntennaType::when($this->search, function ($query, $search) {
                    return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('model', 'like', '%' . $search . '%');
                })->paginate($this->perPage),
        ]);
    }
}
