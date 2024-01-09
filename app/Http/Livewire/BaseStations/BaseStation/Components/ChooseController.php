<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\Controllers\Controller;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseController extends Component
{
    use WithSearing, WithPaginating;

    public int $diapason_id;

    public int|null $controller_id = null;
    public string|null $controller_name = null;

    public function clickController(int $id): void
    {
        $this->controller_id = $id;
    }

    public function choose(): void
    {
        $controller = Controller::findOrFail($this->controller_id);

        $this->controller_name = $controller->name;

        $this->emit('controllerChosen', [
            'controller_id' => $this->controller_id,
            'diapason_id' => $this->diapason_id,
        ]);
    }

    public function render(): View
    {
        $user_regions = auth()->user()->branches[0]->regions->pluck('id')->toArray();

        return view('livewire.base-stations.base-station.components.choose-controller', [
            'controllers' => Controller::whereIn('region_id', $user_regions)
                ->when($this->search, function ($query, $search) {
                    return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('number', 'like', '%' . $search . '%')
                        ->orWhere('address', 'like', '%' . $search . '%');
                })->paginate($this->perPage),
        ]);
    }
}
