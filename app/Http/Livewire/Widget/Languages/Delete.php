<?php

namespace App\Http\Livewire\Widget\Languages;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\Widget\Languages\Delete\DeleteService;

class Delete extends Component
{
    use WithDispatching;

    public ?Language $language = null;

    public function delete(DeleteService $service): void
    {
        try {
            $delete = $service->delete($this->language);

            if ($delete) {
                $this->dispatchBrowserEvent('refresh-page');
            } else {
                $this->dispatchSuccess('delete', 'deleting-succeed', $this->language->title);
                $this->emitUp('refresh');
            }
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.widget.languages.delete');
    }
}
