<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Livewire\Component;

class ChooseRruNumber extends Component
{
    use WithSearing, WithPaginating;
    public array $rru = [];
    public ?int $rru_id = null;
    public int $count = 0;
    public int $row_key;
    public string $module_name;

    public function render()
    {
        $modules = [];
        foreach ($this->rru as $value)
        {
            $modules[] = ["id" => $value["id"], "title" => $value["bts_type"]];
        }
        return view('livewire.base-stations.base-station.components.choose-rru-number',['modules' => $modules, 'module_name' => $this->module_name]);
    }

    public function set()
    {
        $arr = ["count" => $this->count, "rru_id" => $this->rru_id, "key" => $this->row_key];
        $this->emit('rruChosen', $arr);
    }
}
