<?php

namespace App\Http\Livewire\Positions\Position\Acceptor\Response;

use App\Models\Positions\PositionApplications\PositionApplication;
use App\Services\Positions\Position\Cancel\CancelService;
use App\Traits\Livewire\WithDispatching;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Cancel extends Component
{
    use WithDispatching;

    public PositionApplication $application;

    public string $comment = '';

    protected array $rules = [
        'comment' => ['nullable', 'string'],
    ];

    /**
     * @throws Exception
     */
    public function cancel(CancelService $service)
    {
        $validateData = $this->validate();
        $service->cancel($validateData, $this->application);
        $this->dispatchSuccess('delete', 'cancelling-succeed', $this->application->position->name);
        $this->emitUp('refresh');
    }

    public function render(): View
    {
        return view('livewire.positions.position.acceptor.response.cancel');
    }
}
