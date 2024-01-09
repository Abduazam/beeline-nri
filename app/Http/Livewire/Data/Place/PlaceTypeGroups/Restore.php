<?php

namespace App\Http\Livewire\Data\Place\PlaceTypeGroups;

use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroupTranslation;
use App\Models\Widget\Language;
use App\Services\Data\Place\PlaceTypeGroups\Restore\RestoreService;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Exception;

class Restore extends Component
{
    use WithDispatching, ValueFromData;

    public ?PlaceTypeGroup $group = null;
    public array $data = [];
    public ?int $type_id = null;

    protected array $rules = [
        'type_id' => ['required', 'numeric'],
        'data' => ['required', 'array'],
        'data.*' => ['required', 'string', 'min:2'],
    ];

    public function mount(): void
    {
        $translations = PlaceTypeGroupTranslation::query()->where('place_type_group_id', $this->group->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }

        $this->type_id = $this->group->place_type_id;
    }

    /**
     * @throws Exception
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->group);

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
        return view('livewire.data.place.place-type-groups.restore', compact('languages'));
    }
}
