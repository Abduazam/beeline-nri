<?php

namespace App\Http\Livewire\Data\Position\Companies;

use App\Models\Data\Position\Company\Company;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $companies = Company::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->search, function ($query, $search) {
                $query->whereHas('translations', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')->where('locale', App::getLocale());
                });
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $companies = ($this->perPage === 0) ? $companies->get() : $companies->paginate($this->perPage);

        return view('livewire.data.position.companies.index', compact('companies'));
    }
}
