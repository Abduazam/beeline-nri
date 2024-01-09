<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\Motors\Motor;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseMotorType extends Component
{
    public int $index = 0;

    use WithSearing, WithPaginating;

    public int|null $motor_id = null;

    public string|null $motor_model = null;

    public function clickMotor(int $id): void
    {
        $this->motor_id = $id;
    }

    public function choose(): void
    {
        $motor = Motor::findOrFail($this->motor_id);

        $this->motor_model = $motor->title;

        $this->emit('motorChosen', [
            'index' => $this->index,
            'motor_id' => $this->motor_id,
        ]);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-motor-type', [
            'motors' => Motor::all(),
            'key' => $this->index,
        ]);
    }
}
