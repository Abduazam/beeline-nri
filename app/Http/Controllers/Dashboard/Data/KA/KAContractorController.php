<?php

namespace App\Http\Controllers\Dashboard\Data\KA;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KAContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('k-as section');
        return view('dashboard.data.k-as.index');
    }
}
