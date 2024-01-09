<?php

namespace App\Http\Controllers\Dashboard\Data\Position;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('companies section');
        return view('dashboard.data.position.companies.index');
    }
}
