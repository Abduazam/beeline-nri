<?php

namespace App\Http\Controllers\Dashboard\Data\Purpose;

use App\Http\Controllers\Controller;
use App\Models\Data\Purpose\Purpose;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('purposes section');
        return view('dashboard.data.purposes.index');
    }
}
