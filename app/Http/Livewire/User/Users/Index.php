<?php

namespace App\Http\Livewire\User\Users;

use Livewire\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Repository\UserRepository;
use App\Traits\Livewire\WithSearing;
use App\Traits\Livewire\WithSorting;
use App\Traits\Livewire\WithPaginating;

class Index extends Component
{
    use WithSearing, WithSorting, WithPaginating;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(): View
    {
        $repository = new UserRepository($this->is_archived, $this->role_id, $this->search, $this->orderBy, $this->orderDirection, $this->perPage);
        $users = $repository->getUserList();

        $roles = Role::query()->get();

        return view('livewire.user.users.index', compact('users', 'roles'));
    }
}
