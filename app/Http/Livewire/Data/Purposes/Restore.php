<?php

namespace App\Http\Livewire\Data\Purposes;

use App\Models\Data\Purpose\Purpose;
use App\Models\Data\Purpose\PurposeTranslation;
use App\Models\Widget\Language;
use App\Services\Data\Purpose\Restore\RestoreService;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Exception;

class Restore extends Component
{
    use WithDispatching, ValueFromData;

    public ?Purpose $purpose = null;
    public array $data = [];

    protected array $rules = [
        'data' => ['required', 'array'],
        'data.*' => ['required', 'string', 'min:2'],
    ];

    public function mount(): void
    {
        $translations = PurposeTranslation::query()->where('purpose_id', $this->purpose->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }
    }

    /**
     * @throws Exception
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->purpose);

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
        return view('livewire.data.purposes.restore', compact('languages'));
    }
}
