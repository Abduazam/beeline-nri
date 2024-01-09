<?php

namespace App\Http\Livewire\Positions\Position\Acceptor;

use App\Models\Positions\PositionApplications\PositionApplication;
use App\Services\Positions\Position\Send\SendService;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public PositionApplication $application;

    protected $listeners = ['refresh' => '$refresh'];

    public function send()
    {
        $service = new SendService();
        $service->send([], $this->application);
        return redirect()->route('positions.position.index');
    }

    public function render(): View
    {
        return view('livewire.positions.position.acceptor.show');
    }
}
