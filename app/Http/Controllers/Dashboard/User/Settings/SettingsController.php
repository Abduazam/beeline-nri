<?php

namespace App\Http\Controllers\Dashboard\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        return view('dashboard.user.settings.index');
    }
}
