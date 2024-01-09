<?php

namespace App\Http\Controllers\Dashboard\Data\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Data\Controllers\Controller as ControllerModel;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ControllersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('controllers section');
        return view('dashboard.data.controllers.index');
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('controllers section');
        return view('dashboard.data.controllers.create');
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
     * @throws AuthorizationException
     */
    public function show(ControllerModel $controller): View
    {
        $this->authorize('view controller');
        return view('dashboard.data.controllers.show', compact('controller'));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(ControllerModel $controller): View
    {
        $this->authorize('edit controller');
        return view('dashboard.data.controllers.edit', compact('controller'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ControllerModel $controller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControllerModel $controller)
    {
        //
    }
}
