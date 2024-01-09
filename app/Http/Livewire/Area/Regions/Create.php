<?php

namespace App\Http\Livewire\Area\Regions;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Models\Area\Branch\Branch;
use Illuminate\Support\Facades\App;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\Area\Regions\Create\CreateService;

class Create extends Component
{
    use WithDispatching, ValueFromData;

    public ?int $branch_id = null;
    public array $data = [];

    protected array $rules = [
        'branch_id' => ['required', 'numeric'],
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
            $service->create($validatedData);

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
        $branches = Branch::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();

        return view('livewire.area.regions.create', compact('languages', 'branches'));
    }
}
