<?php

namespace App\Http\Controllers\Dashboard\Area;

use App\Http\Controllers\Controller;
use App\Models\Area\Area\Area;
use App\Models\Area\Branch\Branch;
use App\Models\Area\Region\Region;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AreaController extends Controller
{
    /**
     * Show the area section dashboard.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('area section');
        $branches = Branch::query()->count();
        $regions = Region::query()->count();
        $areas = Area::query()->count();
        return view('dashboard.area.index', compact('branches', 'regions', 'areas'));
    }
}
