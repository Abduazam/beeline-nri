<?php

namespace App\Http\Livewire\Widget\Languages;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use App\Traits\Livewire\WithPaginating;

class Index extends Component
{
    use WithSearing, WithSorting, WithPaginating;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $languages = Language::query()
            ->select('languages.*')
            ->when($this->search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('languages.title', 'like', '%' . $search . '%');
                });
            })
            ->when($this->is_archived === 1, function ($query) {
                return $query->onlyTrashed();
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $languages = ($this->perPage === 0) ? $languages->get() : $languages->paginate($this->perPage);

        return view('livewire.widget.languages.index', compact('languages'));
    }
}
