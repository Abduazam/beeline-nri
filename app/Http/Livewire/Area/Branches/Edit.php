<?php

namespace App\Http\Livewire\Area\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Models\Area\Branch\Branch;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use App\Models\Area\Branch\BranchTranslation;
use Illuminate\Validation\ValidationException;
use App\Services\Area\Branches\Update\UpdateService;

class Edit extends Component
{
    use WithDispatching, ValueFromData;

    public ?Branch $branch = null;
    public array $data = [];

    protected array $rules = [
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
        $translations = BranchTranslation::query()->where('branch_id', $this->branch->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }
    }

    /**
     * @throws Exception
     */
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->update($validatedData['data'], $this->branch);

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
        return view('livewire.area.branches.edit', compact('languages'));
    }
}
