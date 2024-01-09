<?php

namespace App\Http\Controllers\Dashboard\Data\HardwareOwner;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HardwareOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('hardware-owners section');
        return view('dashboard.data.hardware-owners.index');
    }
}
