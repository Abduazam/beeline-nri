<?php

namespace App\Http\Livewire\Data\Position\Companies;

use App\Models\Widget\Language;
use App\Services\Data\Position\Company\Create\CreateService;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Exception;

class Create extends Component
{
    use WithDispatching, ValueFromData;

    public array $data = [];

    protected array $rules = [
        'data' => ['required', 'array'],
        'data.*' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

    public function mount(): void
    {
        $languages = Language::query()->get();
        foreach ($languages as $language) {
            $this->data[$language->slug] = null;
        }
    }

    /**
     * @throws Exception
     */
    public function store(CreateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->create($validatedData['data']);

            $title = $this->getValueFromData($validatedData['data']);

            $this->dispatchSuccess('create', 'creating-succeed', $title);
            $this->reset();
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        $languages = Language::query()->get();
        return view('livewire.data.position.companies.create', compact('languages'));
    }
}
