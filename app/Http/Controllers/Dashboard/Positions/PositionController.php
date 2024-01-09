<?php

namespace App\Http\Controllers\Dashboard\Positions;

use App\Http\Controllers\Controller;
use App\Models\Positions\Position\Position;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PositionController extends Controller
{
    /**
     * Show the workflow section dashboard.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('positions section');
        return view('dashboard.positions.index');
    }
}
