<?php

namespace App\Http\Livewire\Area\Areas;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Area\Area\Area;
use App\Models\Widget\Language;
use App\Models\Area\Branch\Branch;
use App\Models\Area\Region\Region;
use Illuminate\Support\Facades\App;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use App\Models\Area\Area\AreaTranslation;
use Illuminate\Validation\ValidationException;
use App\Services\Area\Areas\Update\UpdateService;

class Edit extends Component
{
    use WithDispatching, ValueFromData;

    public ?Area $area = null;
    public array $data = [];
    public ?int $branch_id = null;
    public ?int $region_id = null;
    public $regions = [];

    protected array $rules = [
        'branch_id' => ['required', 'numeric'],
        'region_id' => ['required', 'numeric'],
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
        $translations = AreaTranslation::query()->where('area_id', $this->area->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }

        $region = Region::query()->where('id', $this->area->region_id)->first();

        $this->region_id = $region->id;
        $this->branch_id = $region->branch_id;
        $this->regions = Region::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->where('branch_id', $region->branch_id)
            ->get();
    }

    public function updatedBranchId($branch_id): void
    {
        $this->regions = Region::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->where('branch_id', $this->branch_id)
            ->get();
    }

    /**
     * @throws Exception
     */
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->edit($validatedData, $this->area);

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

        return view('livewire.area.areas.edit', compact('branches', 'languages'));
    }
}
