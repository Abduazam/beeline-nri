<?php

namespace App\Http\Livewire\Area\Branches;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Models\Area\Branch\Branch;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use App\Models\Area\Branch\BranchTranslation;
use Illuminate\Validation\ValidationException;
use App\Services\Area\Branches\Restore\RestoreService;

class Restore extends Component
{
    use WithDispatching, ValueFromData;

    public ?Branch $branch = null;
    public array $data = [];

    protected array $rules = [
        'data' => ['required', 'array'],
        'data.*' => ['required', 'string', 'min:2'],
    ];

    public function mount(): void
    {
        $translations = BranchTranslation::query()->where('branch_id', $this->branch->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }
    }

    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->branch);

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
        return view('livewire.area.branches.restore', compact('languages'));
    }
}
