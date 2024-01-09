<?php

namespace App\Http\Livewire\Data\CoordinateTypes;

use App\Services\Data\CoordinateType\Create\CreateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Create extends Component
{
    use WithDispatching;

    public ?string $name = null;

    protected array $rules = [
        'name' => ['required', 'string', 'min:2'],
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

            $this->dispatchSuccess('create', 'creating-succeed', $validatedData['name']);
            $this->reset();
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.coordinate-types.create');
    }
}
