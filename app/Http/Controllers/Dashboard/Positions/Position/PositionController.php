<?php

namespace App\Http\Controllers\Dashboard\Positions\Position;

use App\Http\Controllers\Controller;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionAcceptors\PositionAcceptor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('position section');
        return view('dashboard.positions.position.index');
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create position');
        return view('dashboard.positions.position.create');
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
    public function show(Position $position)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(Position $position)
    {
        $this->authorize('edit position');
        if (!$position->trashed() and !$position->hasApplicationDelete() and !$position->hasApplicationEdit()) {
            return view('dashboard.positions.position.edit', compact('position'));
        }

        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Delete the specified resource from storage.
     * @throws AuthorizationException
     */
    public function delete(Position $position): View
    {
        $this->authorize('delete position');
        if (!$position->trashed() and !$position->hasApplicationDelete()) {
            return view('dashboard.positions.position.delete', compact('position'));
        }

        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
    }
}
