<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use Illuminate\View\View;
use Livewire\Component;

class ChooseAntennaSectors extends Component
{
    public int $index = 0;
    public array $sectors;
    public array $chosen_sectors = [];

    public ?string $sectors_name = null;

    public function chooseSector($id): void
    {
        if (array_key_exists($id, $this->chosen_sectors)) {
            unset($this->chosen_sectors[$id]);
        } else {
            $this->chosen_sectors[$id] = $this->sectors[$id]['title'];
        }
    }

    public function choose(): void
    {
        $this->sectors_name = implode(", ", $this->chosen_sectors);

        $this->emit('antennaSectorsChosen', [
            'index' => $this->index,
            'sectors_name' => $this->sectors_name,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-antenna-sectors', [
            'key' => $this->index,
            'sectors' => $this->sectors,
        ]);
    }
}
