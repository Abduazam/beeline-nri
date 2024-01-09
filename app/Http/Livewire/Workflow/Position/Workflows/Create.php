<?php

namespace App\Http\Livewire\Workflow\Position\Workflows;

use App\Services\Workflow\Position\Create\CreateService;
use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;

class Create extends Component
{
    use WithDispatching;

    public ?string $title = null;

    protected array $rules = [
        'title' => ['required', 'unique:position_workflows,title', 'min:2'],
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
        return view('livewire.workflow.position.workflows.create');
    }
}
