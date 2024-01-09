<?php

namespace App\Http\Livewire\Widget\Languages;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\Widget\Languages\Update\UpdateService;

class Edit extends Component
{
    use WithDispatching;

    public ?Language $language = null;

    protected array $rules = [
        'language.title' => ['required', 'min:2'],
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
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();

            $service->update($validatedData, $this->language);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['language']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.widget.languages.edit');
    }
}
