<?php

namespace App\Http\Livewire\Data\Position\Companies;

use App\Models\Data\Position\Company\Company;
use App\Models\Data\Position\Company\CompanyTranslation;
use App\Models\Widget\Language;
use App\Services\Data\Position\Company\Delete\DeleteService;
use App\Traits\Livewire\ValueFromData;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Exception;

class Delete extends Component
{
    use WithDispatching, ValueFromData;

    public ?Company $company = null;
    public array $data = [];

    protected array $rules = [
        'data' => ['required', 'array'],
        'data.*' => ['required', 'string', 'min:2'],
    ];

    public function mount(): void
    {
        $translations = CompanyTranslation::query()->where('company_id', $this->company->id)->get();
        foreach ($translations as $translation) {
            $this->data[$translation->locale] = $translation->name;
        }
    }

    /**
     * @throws Exception
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->company);

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
        return view('livewire.data.position.companies.delete', compact('languages'));
    }
}
