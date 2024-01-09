<?php

namespace App\Http\Livewire\User\Users;

use Exception;
use Livewire\Component;
use App\Models\User\User;
use Illuminate\View\View;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\User\Users\Restore\RestoreService;

class Restore extends Component
{
    use WithDispatching;

    public ?User $user = null;

    /**
     * @throws Exception
     */
    public function restore(RestoreService $service): void
    {
        try {
            $service->restore($this->user);
            $this->dispatchSuccess('restore', 'restoring-succeed', $this->user->name);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.user.users.restore');
    }
}
