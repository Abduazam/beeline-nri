<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\MuTypes\MuType;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseControlModuleMuType extends Component
{
    public int $index = 0;

    use WithSearing, WithPaginating;

    public int|null $module_id = null;

    public string|null $mu_type_model = null;

    public function clickModule(int $id): void
    {
        $this->module_id = $id;
    }

    public function choose(): void
    {
        $mu_type = MuType::findOrFail($this->module_id);

        $this->mu_type_model = $mu_type->model;

        $this->emit('controlModuleMuTypeChosen', [
            'index' => $this->index,
            'mu_type_id' => $this->module_id,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-control-module-mu-type',[
            'modules' => MuType::all(),
            'key' => $this->index,
        ]);
    }
}
