<?php

namespace App\Http\Controllers\Dashboard\Area\Regions;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('regions section');
        return view('dashboard.area.regions.index');
    }
}
