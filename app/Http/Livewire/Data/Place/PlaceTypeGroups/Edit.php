<?php

namespace App\Http\Livewire\Data\Place\PlaceTypeGroups;

use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroupTranslation;
use App\Models\Widget\Language;
use App\Services\Data\Place\PlaceTypeGroups\Update\UpdateService;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Exception;

class Edit extends Component
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

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

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
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->update($validatedData, $this->group);

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
        $types = PlaceType::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();

        return view('livewire.data.place.place-type-groups.edit', compact('types', 'languages'));
    }
}
