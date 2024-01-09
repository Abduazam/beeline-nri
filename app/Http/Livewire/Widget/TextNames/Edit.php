<?php

namespace App\Http\Livewire\Widget\TextNames;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Models\Widget\TextName;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\Widget\TextNames\Update\UpdateService;

class Edit extends Component
{
    use WithDispatching;

    public ?string $textKey = null;
    public array $data = [];

    protected array $rules = [
        'textKey' => ['required', 'string'],
        'data' => ['required', 'array'],
        'data.*' => ['required', 'string'],
    ];

    public function mount(): void
    {
        $languages = Language::query()->get();
        foreach ($languages as $language) {
            $text = TextName::query()->where('key', $this->textKey)->where('locale', $language->slug)->first();
            $this->data[$language->slug] = $text?->translation;
        }
    }

    /**
     * @throws Exception
     */
    public function update(UpdateService $service)
    {
        try {
            $validatedData = $this->validate();

            $service->update($validatedData);

            return redirect()->route('widget.text-names.show', $this->textKey);
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        $languages = Language::query()->get();
        return view('livewire.widget.text-names.edit', compact('languages'));
    }
}
