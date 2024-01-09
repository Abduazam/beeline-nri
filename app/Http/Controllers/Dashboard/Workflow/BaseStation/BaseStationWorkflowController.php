<?php

namespace App\Http\Controllers\Dashboard\Workflow\BaseStation;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BaseStationWorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('base-station workflow section');
        return view('dashboard.workflow.base-station.index');
    }
}
