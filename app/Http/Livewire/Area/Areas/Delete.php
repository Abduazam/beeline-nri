<?php

namespace App\Http\Livewire\Area\Areas;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Area\Area\Area;
use App\Models\Widget\Language;
use App\Models\Area\Region\Region;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use App\Models\Area\Area\AreaTranslation;
use Illuminate\Validation\ValidationException;
use App\Services\Area\Areas\Delete\DeleteService;

class Delete extends Component
{
    use WithDispatching, ValueFromData;

    public ?Area $area = null;
    public ?int $branch_id = null;
    public ?int $region_id = null;
    public array $data = [];

    protected array $rules = [
        'branch_id' => ['required', 'numeric'],
        'region_id' => ['required', 'numeric'],
        'data' => ['required', 'array'],
        'data.*' => ['required', 'string', 'min:2'],
    ];

    public function mount(): void
    {
        $translations = AreaTranslation::query()->where('area_id', $this->area->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }

        $region = Region::query()->where('id', $this->area->region_id)->first();

        $this->region_id = $region->id;
        $this->branch_id = $region->branch_id;
    }

    /**
     * @throws Exception
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->area);

            $title = $this->getValueFromData($validatedData['data']);

            $this->dispatchSuccess('delete', 'deleting-succeed', $title);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        $languages = Language::query()->get();
        return view('livewire.area.areas.delete', compact('languages'));
    }
}
