<?php

namespace App\Http\Controllers\Dashboard\Data\GeneralContractor;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GeneralContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('general-contractors section');
        return view('dashboard.data.general-contractors.index');
    }
}
