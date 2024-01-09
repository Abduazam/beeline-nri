<?php

namespace App\Http\Controllers\Dashboard\Data\BaseStation;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('base station application types section');
        return view('dashboard.data.base-station.application-types.index');
    }
}
