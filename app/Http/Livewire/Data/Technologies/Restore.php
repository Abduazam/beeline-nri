<?php

namespace App\Http\Livewire\Data\Technologies;

use App\Models\Data\Technology\Technology;
use App\Services\Data\Technology\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
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
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->technology);

            $this->dispatchSuccess('restore', 'restoring-succeed', $validatedData['technology']['name']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.technologies.restore');
    }
}
