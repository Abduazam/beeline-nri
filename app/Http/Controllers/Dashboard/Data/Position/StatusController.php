<?php

namespace App\Http\Controllers\Dashboard\Data\Position;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('statuses section');
        return view('dashboard.data.position.statuses.index');
    }
}
