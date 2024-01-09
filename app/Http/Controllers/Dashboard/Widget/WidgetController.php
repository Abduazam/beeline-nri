<?php

namespace App\Http\Controllers\Dashboard\Widget;

use App\Http\Controllers\Controller;
use App\Models\Widget\Language;
use App\Models\Widget\TableColumnName;
use App\Models\Widget\TextName;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WidgetController extends Controller
{
    /**
     * Show the widget section dashboard.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('widget section');
        $languages = Language::query()->count();
        $tables = TableColumnName::query()->distinct()->count('table_name');
        $texts = TextName::query()->count();
        return view('dashboard.widget.index', compact('languages', 'tables', 'texts'));
    }
}
