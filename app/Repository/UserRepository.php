<?php

namespace App\Repository;

use App\Models\User\User;

class UserRepository
{
    public function __construct(
        public int $is_archived,
        public ?int $role_id,
        public string $search,
        public string $orderBy,
        public string $orderDirection,
        public int $perPage,
    )
    {
    }

    public function getUserList()
    {
        $users = User::query()
            ->with('roles')
            ->when($this->is_archived == 1, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($this->role_id, function ($query, $role_id) {
                return $query->whereHas('roles', function ($query) use ($role_id) {
                    $query->where('id', $role_id);
                });
            })
            ->when($this->search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', '%' . $search . '%')
                        ->orWhere('users.email', 'like', '%' . $search . '%');
                });
            })
            ->where('id', '!=', auth()->user()->id)
            ->orderBy($this->orderBy, $this->orderDirection);
        return $this->perPage === 0 ? $users->get() : $users->paginate($this->perPage);
    }
}
