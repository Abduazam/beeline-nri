<?php

namespace App\Http\Controllers\Dashboard\Data\LocationAntenna;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationAntennaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('location-antennas section');
        return view('dashboard.data.location-antennas.index');
    }
}
