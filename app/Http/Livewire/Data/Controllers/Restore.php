<?php

namespace App\Http\Livewire\Data\Controllers;

use App\Models\Data\Controllers\Controller;
use App\Services\Data\Controller\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Restore extends Component
{
    use WithDispatching;

    public Controller $controller;

    /**
     * @throws Exception
     */
    public function restore(RestoreService $service)
    {
        $service->restore($this->controller);
        $this->dispatchSuccess('restore', 'restoring-succeed', $this->controller->name);
        $this->emitUp('refresh');
    }

    public function render(): View
    {
        return view('livewire.data.controllers.restore');
    }
}
