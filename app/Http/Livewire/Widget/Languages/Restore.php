<?php

namespace App\Http\Livewire\Widget\Languages;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Services\Widget\Languages\Restore\RestoreService;

class Restore extends Component
{
    public ?Language $language = null;

    /**
     * @throws Exception
     */
    public function restore(RestoreService $service): void
    {
        $service->restore($this->language);

        $this->dispatchBrowserEvent('refresh-page');
    }

    public function render(): View
    {
        return view('livewire.widget.languages.restore');
    }
}
