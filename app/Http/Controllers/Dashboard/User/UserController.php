<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Show the user section dashboard.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('user section');
        $roles = Role::query()->count();
        $users = User::withTrashed()->count();
        $permissions = Permission::query()->count();
        return view('dashboard.user.index', compact('roles', 'users', 'permissions'));
    }
}
