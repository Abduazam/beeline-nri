<?php

namespace App\Http\Livewire\Positions\Position\Acceptor;

use App\Http\Livewire\Positions\Position\Acceptor\Traits\ApplicationEditTrait;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Repository\Positions\Position\PositionRepository;
use App\Services\Positions\Position\Archive\ArchiveService;
use App\Services\Positions\Position\Send\SendService;
use App\Traits\Livewire\DegreeAndDecimal;
use App\Traits\Livewire\ValueFromData;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Edit extends Component
{
    use DegreeAndDecimal, ValueFromData;
    use ApplicationEditTrait;

    public PositionApplication $application;

    /**
     * @throws Exception
     */
    public function submitForm()
    {
        $validatedData = $this->validate();

        if ($this->action === 'send') {
            $service = new SendService();
            $service->send($validatedData, $this->application);
            return redirect()->route('positions.position.index');
        } elseif ($this->action === 'archive') {
            $service = new ArchiveService();
            $application = $service->archive($validatedData, $this->application);
            return redirect()->route('positions.acceptor.edit', $application);
        }
    }

    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function render(PositionRepository $repository): View
    {
        return view('livewire.positions.position.acceptor.edit', [
            'companies' => $repository->getCompanies(),
            'place_types' => $repository->getPlaceTypes(),
            'purposes' => $repository->getPurposes(),
            'regions' => $repository->getRegions(),
            'territories' => $repository->getTerritories(),
            'coordinate_types' => $repository->getCoordinateTypes(),
        ]);
    }
}
