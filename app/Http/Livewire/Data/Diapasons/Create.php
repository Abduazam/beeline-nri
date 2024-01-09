<?php

namespace App\Http\Livewire\Data\Diapasons;

use App\Models\Data\Technology\Technology;
use App\Services\Data\Diapason\Create\CreateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Create extends Component
{
    use WithDispatching;

    public ?int $technology_id = null;
    public ?string $band = null;

    protected array $rules = [
        'technology_id' => ['required', 'numeric', 'exists:technologies,id'],
        'band' => ['required', 'numeric'],
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

            $this->dispatchSuccess('create', 'creating-succeed', $validatedData['band']);
            $this->reset();
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.diapasons.create', [
            'technologies' => Technology::select('id', 'name')->get(),
        ]);
    }
}
