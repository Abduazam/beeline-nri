<?php

namespace App\Http\Controllers\Dashboard\Data\Position;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('states section');
        return view('dashboard.data.position.states.index');
    }
}
