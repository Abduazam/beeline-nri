<?php

namespace App\Http\Controllers\Dashboard\Data\RoomTypes;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('room-types section');
        return view('dashboard.data.room-types.index');
    }
}
