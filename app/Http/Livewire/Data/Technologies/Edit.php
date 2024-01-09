<?php

namespace App\Http\Livewire\Data\Technologies;

use App\Models\Data\Technology\Technology;
use App\Services\Data\Technology\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public ?Technology $technology = null;

    protected array $rules = [
        'technology.code' => ['required', 'numeric'],
        'technology.name' => ['required', 'string', 'min:2'],
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
            $service->update($validatedData, $this->technology);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['technology']['name']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.technologies.edit');
    }
}
