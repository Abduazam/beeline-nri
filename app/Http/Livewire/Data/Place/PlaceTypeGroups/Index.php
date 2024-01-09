<?php

namespace App\Http\Livewire\Data\Place\PlaceTypeGroups;

use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Type\Groups\PlacedType\PlacedTypeGroup;
use App\Models\Type\PlacedType\PlacedType;
use App\Traits\Livewire\WithPaginating;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use WithSorting, WithSearing, WithPaginating;

    public string|int $type_id = '';
    public Collection $types;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(): void
    {
        $this->types = PlaceType::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function render(): View
    {
        $groups = PlaceTypeGroup::query()
            ->with('type')
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($this->type_id, function ($query, $type_id) {
                $query->where('placed_type_groups.type_id', $type_id);
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
        $groups = ($this->perPage === 0) ? $groups->get() : $groups->paginate($this->perPage);

        return view('livewire.data.place.place-type-groups.index', compact('groups'));
    }
}
