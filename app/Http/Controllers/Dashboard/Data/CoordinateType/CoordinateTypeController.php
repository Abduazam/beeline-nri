<?php

namespace App\Http\Controllers\Dashboard\Data\CoordinateType;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CoordinateTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('coordinate types section');
        return view('dashboard.data.coordinate-types.index');
    }
}
