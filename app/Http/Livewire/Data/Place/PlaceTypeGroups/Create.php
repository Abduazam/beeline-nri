<?php

namespace App\Http\Livewire\Data\Place\PlaceTypeGroups;

use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Widget\Language;
use App\Services\Data\Place\PlaceTypeGroups\Create\CreateService;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Exception;

class Create extends Component
{
    use WithDispatching, ValueFromData;

    public ?int $type_id = null;
    public array $data = [];

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

    /**
     * @throws Exception
     */
    public function store(CreateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->create($validatedData);

            $title = $this->getValueFromData($validatedData['data']);

            $this->dispatchSuccess('create', 'creating-succeed', $title);
            $this->reset();
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function mount(): void
    {
        $languages = Language::query()->get();
        foreach ($languages as $language) {
            $this->data[$language->slug] = null;
        }
    }

    public function render(): View
    {
        $languages = Language::query()->get();
        $types = PlaceType::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();

        return view('livewire.data.place.place-type-groups.create', compact('types', 'languages'));
    }
}
