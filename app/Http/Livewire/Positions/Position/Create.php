<?php

namespace App\Http\Livewire\Positions\Position;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\DegreeAndDecimal;
use App\Services\Positions\Position\Create\CreateService;
use App\Repository\Positions\Position\PositionRepository;
use App\Services\Positions\Position\Archive\ArchiveService;
use App\Http\Livewire\Positions\Position\Forms\PositionCreateForm;

class Create extends Component
{
    use DegreeAndDecimal, ValueFromData;
    use PositionCreateForm;

    /**
     * @throws Exception
     */
    public function submitForm()
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            if ($this->action === 'store') {
                $service = new CreateService();
                $service->create($validatedData);
                return redirect()->route('positions.position.index');
            } elseif ($this->action === 'archive') {
                $service = new ArchiveService();
                $position = $service->archive($validatedData);
                return redirect()->route('positions.position.edit', $position);
            }
        }
    }

    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function render(PositionRepository $repository): View
    {
        return view('livewire.positions.position.create', [
            'companies' => $repository->getCompanies(),
            'place_types' => $repository->getPlaceTypes(),
            'purposes' => $repository->getPurposes(),
            'regions' => $repository->getRegions(),
            'territories' => $repository->getTerritories(),
            'coordinate_types' => $repository->getCoordinateTypes(),
        ]);
    }
}
