<?php

namespace App\Http\Livewire\Data\ApplicationTypes;

use App\Enums\Data\ApplicationType\ApplicationTypeForEnum;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    public string $for = '';

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $types = ApplicationType::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($this->is_archived === 1, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->for, function ($query, $for) {
                $query->where('for', $for);
            })
            ->when($this->search, function ($query, $search) {
                $query->whereHas('translations', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')->where('locale', App::getLocale());
                });
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $types = ($this->perPage === 0) ? $types->get() : $types->paginate($this->perPage);

        return view('livewire.data.application-types.index', [
            'types' => $types,
            'fors' => [ApplicationTypeForEnum::POSITION->value, ApplicationTypeForEnum::BASE_STATION->value],
        ]);
    }
}
