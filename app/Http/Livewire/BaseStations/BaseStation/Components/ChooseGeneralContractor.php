<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Components;

use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Models\Data\GeneralContractor\GeneralContractorType;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use Illuminate\View\View;
use Livewire\Component;

class ChooseGeneralContractor extends Component
{
    use WithSearing, WithPaginating;

    public int|null $general_contractor_id = null;
    public int $type_id = 0;

    public function clickGeneralContractor(int $id): void
    {
        $this->general_contractor_id = $id;
    }

    public function choose(): void
    {
        $this->emit('generalContractorChosen', $this->general_contractor_id);
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.components.choose-general-contractor', [
            'general_contractors' => GeneralContractor::query()
                ->when($this->search, function ($query, $search) {
                    return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('inn', 'like', '%' . $search . '%')
                        ->orWhere('id', 'like', '%' . $search . '%')
                        ->orWhere('address', 'like', '%' . $search . '%');
                })
                ->when($this->type_id, function ($query, $type_id) {
                    return $query->where('general_contractor_type_id', $type_id);
                })
                ->paginate($this->perPage),
            'types' => GeneralContractorType::all(),
        ]);
    }
}
