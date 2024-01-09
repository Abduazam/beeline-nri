<?php

namespace App\Http\Livewire\Area\Regions;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Models\Area\Branch\Branch;
use App\Models\Area\Region\Region;
use Illuminate\Support\Facades\App;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use App\Models\Area\Region\RegionTranslation;
use Illuminate\Validation\ValidationException;
use App\Services\Area\Regions\Update\UpdateService;

class Edit extends Component
{
    use WithDispatching, ValueFromData;

    public ?Region $region = null;
    public array $data = [];
    public ?int $branch_id = null;

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
        $translations = RegionTranslation::query()->where('region_id', $this->region->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }

        $this->branch_id = $this->region->branch_id;
    }

    /**
     * @throws Exception
     */
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->update($validatedData, $this->region);

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
        $branches = Branch::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();

        return view('livewire.area.regions.edit', compact('languages', 'branches'));
    }
}
