<?php

namespace App\Http\Livewire\Data\Controllers;

use App\Models\Data\Controllers\Controller;
use App\Services\Data\Controller\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Delete extends Component
{
    use WithDispatching;

    public Controller $controller;

    /**
     * @throws Exception
     */
    public function delete(DeleteService $service)
    {
        $service->delete($this->controller);
        $this->dispatchSuccess('delete', 'deleting-succeed', $this->controller->name);
        $this->emitUp('refresh');
    }

    public function render(): View
    {
        return view('livewire.data.controllers.delete');
    }
}
