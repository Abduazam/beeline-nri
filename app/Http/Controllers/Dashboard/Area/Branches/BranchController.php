<?php

namespace App\Http\Controllers\Dashboard\Area\Branches;

use App\Http\Controllers\Controller;
use App\Models\Area\Branch\Branch;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('branches section');
        return view('dashboard.area.branches.index');
    }
}
