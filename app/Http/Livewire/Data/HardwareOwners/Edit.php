<?php

namespace App\Http\Livewire\Data\HardwareOwners;

use App\Models\Data\HardwareOwner\HardwareOwner;
use App\Services\Data\HardwareOwner\Update\UpdateService;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    use WithDispatching;

    public ?HardwareOwner $hardware_owner = null;

    protected array $rules = [
        'hardware_owner.title' => ['required', 'string', 'min:2'],
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
            $service->update($validatedData, $this->hardware_owner);

            $this->dispatchSuccess('edit', 'editing-succeed', $validatedData['hardware_owner']['title']);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.data.hardware-owners.edit');
    }
}
