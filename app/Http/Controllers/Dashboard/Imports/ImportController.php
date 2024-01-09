<?php

namespace App\Http\Controllers\Dashboard\Imports;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    public function index(): View
    {
        return view('dashboard.imports.index');
    }
}
