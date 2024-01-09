<?php

namespace App\Http\Controllers\Dashboard\Data\HardwareRoom;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HardwareRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('hardware-rooms section');
        return view('dashboard.data.hardware-rooms.index');
    }
}
