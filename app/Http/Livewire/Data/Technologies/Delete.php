<?php

namespace App\Http\Livewire\Data\Technologies;

use App\Models\Data\Technology\Technology;
use App\Services\Data\Technology\Delete\DeleteService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Delete extends Component
{
    use WithDispatching;

    public ?Technology $technology = null;

    protected array $rules = [
        'technology.code' => ['required', 'numeric'],
        'technology.name' => ['required', 'string', 'min:2'],
    ];

    /**
     * @throws Throwable
     */
    public function delete(DeleteService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->delete($this->technology);

            $this->dispatchSuccess('delete', 'deleting-succeed', $validatedData['technology']['name']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.technologies.delete');
    }
}
