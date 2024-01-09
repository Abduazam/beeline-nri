<?php

namespace App\Http\Controllers\Dashboard\Data\Place;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlaceTypeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('place type groups section');
        return view('dashboard.data.place.place-type-groups.index');
    }
}
