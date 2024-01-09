<?php

namespace App\Http\Controllers\Dashboard\Positions\Position;

use App\Http\Controllers\Controller;
use App\Models\Positions\PositionApplications\PositionApplication;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PositionAcceptorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(int $application): View
    {
        $this->authorize('view position');
        return view('dashboard.positions.position.acceptor.show', [
            'application' => PositionApplication::findOrFail($application),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit position');
        $application = PositionApplication::findOrFail($id);
        if ($application->isPreparing() or $application->isCancelled()) {
            return view('dashboard.positions.position.acceptor.edit', [
                'application' => $application,
            ]);
        }

        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PositionApplication $positionApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        dd($id);
    }
}
