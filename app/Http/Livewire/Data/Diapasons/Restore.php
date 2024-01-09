<?php

namespace App\Http\Livewire\Data\Diapasons;

use App\Models\Data\Diapason\Diapason;
use App\Services\Data\Diapason\Restore\RestoreService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Restore extends Component
{
    use WithDispatching;

    public ?Diapason $diapason = null;

    protected array $rules = [
        'diapason.technology_id' => ['required', 'numeric', 'exists:technologies,id'],
        'diapason.band' => ['required', 'numeric'],
    ];

    /**
     * @throws Throwable
     */
    public function restore(RestoreService $service): void
    {
        try {
            $validatedData = $this->validate();
            $service->restore($this->diapason);

            $this->dispatchSuccess('restore', 'restoring-succeed', $this->diapason->technology->name . '-' . $validatedData['diapason']['band']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.diapasons.restore');
    }
}
