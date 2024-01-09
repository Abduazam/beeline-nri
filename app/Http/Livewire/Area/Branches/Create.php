<?php

namespace App\Http\Livewire\Area\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\Area\Branches\Create\CreateService;

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
            $this->mount();
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        $languages = Language::query()->get();
        return view('livewire.area.branches.create', compact('languages'));
    }
}
