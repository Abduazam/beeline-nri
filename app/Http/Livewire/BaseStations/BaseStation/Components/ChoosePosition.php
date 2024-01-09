<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Positions\Position\Position;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChoosePosition extends Component
{
    use WithSearing, WithPaginating;

    public int|null $position_id = null;

    public function clickPosition(int $id): void
    {
        $this->position_id = $id;
    }

    public function choose(): void
    {
        $this->emit('positionChosen', $this->position_id);
    }

    public function render(): View
    {
        $user_regions = auth()->user()->branches[0]->regions->pluck('id')->toArray();
        
        return view('livewire.base-stations.base-station.components.choose-position', [
            'positions' => Position::whereIn('region_id', $user_regions)
                ->when($this->search, function ($query, $search) {
                    return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('id', 'like', '%' . $search . '%')
                        ->orWhere('address', 'like', '%' . $search . '%');
                })->paginate($this->perPage),
        ]);
    }
}
