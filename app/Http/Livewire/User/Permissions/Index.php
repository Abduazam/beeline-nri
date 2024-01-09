<?php

namespace App\Http\Livewire\User\Permissions;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\WithSorting;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithPaginating;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithSearing, WithSorting, WithPaginating;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $permissions = Permission::query()
            ->select('permissions.*')
            ->withCount(['roles as roles'])
            ->when($this->search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('permissions.name', 'like', '%' . $search . '%');
                });
            })
            ->orderBy($this->orderBy, $this->orderDirection);
        $permissions = ($this->perPage === 0) ? $permissions->get() : $permissions->paginate($this->perPage);

        return view('livewire.user.permissions.index', compact('permissions'));
    }
}
