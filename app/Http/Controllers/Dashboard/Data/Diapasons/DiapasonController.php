<?php

namespace App\Http\Controllers\Dashboard\Data\Diapasons;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiapasonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('diapasons section');
        return view('dashboard.data.diapasons.index');
    }
}
