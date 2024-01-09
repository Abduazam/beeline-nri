<?php

namespace App\Http\Controllers\Dashboard\BaseStations\BaseStation;

use App\Http\Controllers\Controller;
use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BaseStationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('base-station section');
        return view('dashboard.base-stations.base-station.index');
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create base-station');
        return view('dashboard.base-stations.base-station.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $baseStationApplication = BaseStationApplication::findOrFail($id);
        return view('dashboard.base-stations.base-station.show', compact('baseStationApplication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BaseStation $baseStation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BaseStation $baseStation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BaseStation $baseStation)
    {
        //
    }
}
