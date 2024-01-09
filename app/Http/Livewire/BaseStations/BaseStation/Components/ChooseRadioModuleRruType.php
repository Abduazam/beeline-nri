<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\RruTypes\RruType;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseRadioModuleRruType extends Component
{
    public int $index = 0;

    use WithSearing, WithPaginating;

    public int|null $module_id = null;

    public string|null $rru_type_model = null;

    public function clickModule(int $id): void
    {
        $this->module_id = $id;
    }

    public function choose(): void
    {
        $rru_type = RruType::findOrFail($this->module_id);

        $this->rru_type_model = $rru_type->model;

        $this->emit('radioModuleRruTypeChosen', [
            'index' => $this->index,
            'rru_type_id' => $this->module_id,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-radio-module-rru-type',[
            'radio_modules' => RruType::all(),
            'key' => $this->index,
        ]);
    }
}
