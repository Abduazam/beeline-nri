<?php

namespace App\Http\Livewire\Widget\TextNames;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\TextName;
use Illuminate\Support\Facades\App;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithPaginating;

class Index extends Component
{
    use WithSearing, WithPaginating;

    public function render(): View
    {
        $texts = TextName::query()
            ->where('locale', App::getLocale())
            ->when($this->search, function ($query, $search) {
                $query->where('key', 'like', '%' . $search . '%')
                    ->orWhere('translation', 'like', '%' . $search . '%');
            });
        $texts = ($this->perPage === 0) ? $texts->get() : $texts->paginate($this->perPage);

        return view('livewire.widget.text-names.index', compact('texts'));
    }
}
