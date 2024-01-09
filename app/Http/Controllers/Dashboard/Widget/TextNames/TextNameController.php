<?php

namespace App\Http\Controllers\Dashboard\Widget\TextNames;

use App\Http\Controllers\Controller;
use App\Models\Widget\Language;
use App\Models\Widget\TextName;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TextNameController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('text names section');
        return view('dashboard.widget.text-names.index');
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
    public function show(string $key): View
    {
        $this->authorize('view text name');
        return view('dashboard.widget.text-names.show', [
            'key' => $key,
            'languages' => Language::query()->get(),
            'texts' => TextName::query()->where('key', $key)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(string $key): View
    {
        $this->authorize('edit text name');
        return view('dashboard.widget.text-names.edit', [
            'key' => $key
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TextName $textName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TextName $textName)
    {
        //
    }
}
