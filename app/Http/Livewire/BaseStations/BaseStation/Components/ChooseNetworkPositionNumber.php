<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Positions\Position\Position;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Livewire\Component;

class ChooseNetworkPositionNumber extends Component
{
    public $index = 0;

    use WithSearing, WithPaginating;

    public int|null $position_id = null;

    public string|null $position_name = null;

    public function clickNetworkPosition(int $id): void
    {
        $this->position_id = $id;
    }

    public function choose(): void
    {
        $position = Position::findOrFail($this->position_id);

        $this->position_name = $position->name;

        $this->emit('networkPositionChosen', [
            'index' => $this->index,
            'position_name' => $this->position_name,
            'position_number' => $position->number,
            'latitude' => $position->latitude,
            'longitude' => $position->longitude,
        ]);
    }

    public function render()
    {
        $user_regions = auth()->user()->branches[0]->regions->pluck('id')->toArray();

        return view('livewire.base-stations.base-station.components.choose-network-position-number', [
            'positions' => Position::whereIn('region_id', $user_regions)
                ->when($this->search, function ($query, $search) {
                    return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('id', 'like', '%' . $search . '%')
                        ->orWhere('address', 'like', '%' . $search . '%');
                })->paginate($this->perPage),
            'key' => $this->index,
        ]);
    }
}
