<?php

namespace App\Http\Livewire\Data\GeneralContractors;

use App\Models\Data\GeneralContractor\GeneralContractorType;
use App\Services\Data\GeneralContractor\Create\CreateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Create extends Component
{
    use WithDispatching;

    public int $type_id = 0;
    public ?string $inn = null;
    public ?string $title = null;
    public ?string $address = null;

    protected array $rules = [
        'type_id' => ['required', 'exists:general_contractor_types,id'],
        'inn' => ['required', 'string', 'min:2'],
        'title' => ['required', 'string', 'min:2'],
        'address' => ['nullable', 'string', 'min:2'],
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

            $this->dispatchSuccess('create', 'creating-succeed', $validatedData['title']);
            $this->reset();
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.general-contractors.create', [
            'types' => GeneralContractorType::all(),
        ]);
    }
}
