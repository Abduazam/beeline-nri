<?php

namespace App\Http\Livewire\User\Users;

use Exception;
use Livewire\Component;
use App\Models\User\User;
use Illuminate\View\View;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\User\Users\Delete\DeleteService;

class Delete extends Component
{
    use WithDispatching;

    public ?User $user = null;

    /**
     * @throws Exception
     */
    public function delete(DeleteService $service): void
    {
        try {
            if ($this->user->id !== 1) {
                $service->delete($this->user);
                $title = 'deleting-succeed';
            } else {
                $title = 'deleting-failed';
            }

            $this->dispatchSuccess('delete', $title, $this->user->name);
            $this->emitUp('refresh');
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.user.users.delete');
    }
}
