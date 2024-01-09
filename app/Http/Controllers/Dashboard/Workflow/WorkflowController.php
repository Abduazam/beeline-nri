<?php

namespace App\Http\Controllers\Dashboard\Workflow;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkflowController extends Controller
{
    /**
     * Show the workflow section dashboard.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('workflow section');
        return view('dashboard.workflow.index');
    }
}
