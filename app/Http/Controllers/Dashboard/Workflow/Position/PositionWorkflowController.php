<?php

namespace App\Http\Controllers\Dashboard\Workflow\Position;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PositionWorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('position workflow section');
        return view('dashboard.workflow.position.index');
    }
}
