<?php

namespace App\Http\Livewire\BaseStations\BaseStation;

use App\Models\Area\Region\Region;
use App\Models\Positions\Position\Position;
use App\Traits\Livewire\WithDispatching;
use Illuminate\View\View;
use Livewire\Component;

class DeleteByRegion extends Component
{
    use WithDispatching;

    public ?int $region_id = null;

    protected $listeners = [
        'execute' => 'execute',
    ];

    public function delete(): void
    {
        if (!is_null($this->region_id)) {
            Position::where('region_id', $this->region_id)->forceDelete();
            $this->dispatchSuccess('create', 'creating-succeed', "Удаление завершено");
        } else {
            $this->dispatchBrowserEvent('dispatch-event', [
                'icon' => "fa fa-circle-exclamation text-warning",
                'title' => "Предупреждение",
                'content' => "<b>Невозможно удалить.</b>",
            ]);
        }
    }

    public function execute(): void
    {
        $response = Position::where('region_id', $this->region_id)->delete();
        if ($response) {
            $this->dispatchBrowserEvent('endProcess');
            $this->dispatchSuccess('create', 'creating-succeed', "Удаление завершено");
        }
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.delete-by-region', [
            'regions' => Region::all(),
        ]);
    }
}
