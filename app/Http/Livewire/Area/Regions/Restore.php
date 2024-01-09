<?php

namespace App\Http\Livewire\Area\Regions;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Models\Area\Region\Region;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use App\Models\Area\Region\RegionTranslation;
use Illuminate\Validation\ValidationException;
use App\Services\Area\Regions\Restore\RestoreService;

class Restore extends Component
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
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->region);

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
        return view('livewire.area.regions.restore', compact('languages'));
    }
}
