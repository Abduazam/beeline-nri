<?php

namespace App\Http\Livewire\Workflow\BaseStation\Workflows;

use App\Services\Workflow\BaseStation\Create\CreateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Create extends Component
{
    use WithDispatching;

    public ?string $title = null;

    protected array $rules = [
        'title' => ['required', 'unique:base_station_workflows,title', 'min:2'],
    ];

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

    /**
     * @throws Throwable
     */
    public function store(CreateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->create($validatedData);

            $this->dispatchSuccess('create', 'creating-succeed', $this->title);
            $this->reset();
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.workflow.base-station.workflows.create');
    }
}
