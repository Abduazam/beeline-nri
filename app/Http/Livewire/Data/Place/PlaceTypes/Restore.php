<?php

namespace App\Http\Livewire\Data\Place\PlaceTypes;

use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceType\PlaceTypeTranslation;
use App\Models\Widget\Language;
use App\Services\Data\Place\PlaceTypes\Restore\RestoreService;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Exception;

class Restore extends Component
{
    use WithDispatching, ValueFromData;

    public ?PlaceType $type = null;
    public array $data = [];

    protected array $rules = [
        'data' => ['required', 'array'],
        'data.*' => ['required', 'string', 'min:2'],
    ];

    public function mount(): void
    {
        $translations = PlaceTypeTranslation::query()->where('place_type_id', $this->type->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }
    }

    /**
     * @throws Exception
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->type);

            $title = $this->getValueFromData($validatedData['data']);

            $this->dispatchSuccess('restore', 'restoring-succeed', $title);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        $languages = Language::query()->get();
        return view('livewire.data.place.place-types.restore', compact('languages'));
    }
}
