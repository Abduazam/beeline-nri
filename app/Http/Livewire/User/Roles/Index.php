<?php

namespace App\Http\Livewire\User\Roles;

use Livewire\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use App\Traits\Livewire\WithPaginating;

class Index extends Component
{
    use WithSearing, WithSorting, WithPaginating;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $roles = Role::query()
            ->select('roles.*')
            ->withCount(['users as users', 'permissions as permissions'])
            ->when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($this->is_archived == 1, function ($query) {
                return $query->onlyTrashed();
            })
            ->orderBy($this->orderBy, $this->orderDirection);

        $roles = ($this->perPage === 0) ? $roles->get() : $roles->paginate($this->perPage);

        return view('livewire.user.roles.index', compact('roles'));
    }
}
