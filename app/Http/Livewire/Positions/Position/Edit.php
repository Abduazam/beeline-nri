<?php

namespace App\Http\Livewire\Positions\Position;

use App\Http\Livewire\Positions\Position\Forms\PositionEditTrait;
use App\Models\Positions\Position\Position;
use App\Repository\Positions\Position\PositionRepository;
use App\Services\Positions\Position\Edit\EditArchiveService;
use App\Services\Positions\Position\Edit\EditSendService;
use App\Traits\Livewire\DegreeAndDecimal;
use App\Traits\Livewire\WithDispatching;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Edit extends Component
{
    use WithDispatching, DegreeAndDecimal;
    use PositionEditTrait;

    public Position $position;

    /**
     * @throws Exception
     */
    public function submitForm()
    {
        $validatedData = $this->validate();

        if ($this->action === 'send') {
            $service = new EditSendService();
            $service->send($this->position, $validatedData);
            return redirect()->route('positions.position.index');
        } elseif ($this->action === 'archive') {
            $service = new EditArchiveService();
            $service->archive($this->position, $validatedData);
            return redirect()->route('positions.position.edit', $this->position);
        }
    }

    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function render(PositionRepository $repository): View
    {
        return view('livewire.positions.position.edit', [
            'companies' => $repository->getCompanies(),
            'place_types' => $repository->getPlaceTypes(),
            'purposes' => $repository->getPurposes(),
            'regions' => $repository->getRegions(),
            'territories' => $repository->getTerritories(),
            'coordinate_types' => $repository->getCoordinateTypes(),
        ]);
    }
}
