<?php

namespace App\Http\Controllers\Dashboard\Area\Areas;

use App\Http\Controllers\Controller;
use App\Models\Area\Area\Area;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('areas section');
        return view('dashboard.area.areas.index');
    }
}
