<?php

namespace App\Http\Livewire\Data\ApplicationTypes;

use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\ApplicationType\ApplicationTypeTranslation;
use App\Models\Widget\Language;
use App\Services\Data\Position\ApplicationType\Update\UpdateService;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching, ValueFromData;

    public ?ApplicationType $type = null;
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
        $translations = ApplicationTypeTranslation::query()->where('application_type_id', $this->type->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }
    }

    /**
     * @throws Throwable
     */
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->update($validatedData['data'], $this->type);

            $title = $this->getValueFromData($validatedData['data']);

            $this->dispatchSuccess('edit', 'editing-succeed', $title);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        $languages = Language::query()->get();
        return view('livewire.data.application-types.edit', compact('languages'));
    }
}
