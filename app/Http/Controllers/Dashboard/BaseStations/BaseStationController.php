<?php

namespace App\Http\Controllers\Dashboard\BaseStations;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BaseStationController extends Controller
{
    /**
     * Show the workflow section dashboard.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('base-stations section');
        return view('dashboard.base-stations.index');
    }
}
