<?php

namespace App\Http\Controllers\Dashboard\Widget\TableColumns;

use App\Http\Controllers\Controller;
use App\Models\Widget\Language;
use App\Models\Widget\TableColumnName;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TableColumnNameController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('table columns section');
        return view('dashboard.widget.table-columns.index');
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(Request $request): View
    {
        $this->authorize('create table column');
        return view('dashboard.widget.table-columns.create', [
            'table' => $request->table_name
        ]);
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
    public function show(string $table): View
    {
        $this->authorize('view table column');
        return view('dashboard.widget.table-columns.show', [
            'table' => $table,
            'languages' => Language::query()->get(),
            'columns' => TableColumnName::query()->where('table_name', $table)->get(),
            'types' => DB::select("SHOW COLUMNS FROM $table"),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(string $table): View
    {
        $this->authorize('edit table column');
        return view('dashboard.widget.table-columns.edit', [
            'table' => $table
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TableColumnName $tableColumnName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TableColumnName $tableColumnName)
    {
        //
    }
}
