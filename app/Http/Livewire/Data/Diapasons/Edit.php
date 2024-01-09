<?php

namespace App\Http\Livewire\Data\Diapasons;

use App\Models\Data\Diapason\Diapason;
use App\Models\Data\Technology\Technology;
use App\Services\Data\Diapason\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public ?Diapason $diapason = null;

    protected array $rules = [
        'diapason.technology_id' => ['required', 'numeric', 'exists:technologies,id'],
        'diapason.band' => ['required', 'numeric'],
    ];

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

    /**
     * @throws Throwable
     */
    public function update(UpdateService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->update($validatedData, $this->diapason);

            $this->dispatchSuccess('edit', 'editing-succeed', $this->diapason->technology->name . '-' . $validatedData['diapason']['band']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.diapasons.edit', [
            'technologies' => Technology::select('id', 'name')->get(),
        ]);
    }
}
