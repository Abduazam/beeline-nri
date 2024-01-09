<?php

namespace App\Http\Controllers\Dashboard\Data\ApplicationType;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;

class ApplicationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('application types section');
        return view('dashboard.data.application-types.index');
    }
}
