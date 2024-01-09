<?php

namespace App\Http\Controllers\Dashboard\Data\Technologies;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('technologies section');
        return view('dashboard.data.technologies.index');
    }
}
