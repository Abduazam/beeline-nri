<?php

namespace App\Http\Livewire\Positions\Position;

use App\Enums\Data\ApplicationType\ApplicationTypeForEnum;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Services\Positions\Position\Delete\DeleteArchiveService;
use App\Services\Positions\Position\Delete\DeleteSendService;
use App\Traits\Livewire\DegreeAndDecimal;
use App\Traits\Livewire\WithDispatching;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Delete extends Component
{
    use WithDispatching, DegreeAndDecimal;

    public Position $position;

    public string $action = 'send';
    public string $comment = '';

    public function mount(): void
    {
        $application_type = ApplicationType::where('aim', 'delete')->where('for', ApplicationTypeForEnum::POSITION->value)->first();
        $application = PositionApplication::where('position_id', $this->position->id)->where('application_type_id', $application_type->id)->first();
        if ($application) {
            $this->comment = $application->comment;
        }
    }

    /**
     * @throws Exception
     */
    public function submitForm()
    {
        if ($this->action === 'send') {
            $service = new DeleteSendService();
            $service->send($this->position, $this->comment);
            return redirect()->route('positions.position.index');
        } elseif ($this->action === 'archive') {
            $service = new DeleteArchiveService();
            $service->archive($this->position, $this->comment);
            return redirect()->route('positions.position.delete', $this->position);
        }
    }

    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function render(): View
    {
        return view('livewire.positions.position.delete');
    }
}
