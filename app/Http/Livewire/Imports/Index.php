<?php

namespace App\Http\Livewire\Imports;

use App\Models\Imports\Excel\UploadedExcelFile;
use Livewire\Component;
use Illuminate\View\View;

class Index extends Component
{
    public bool $processing = false;

    public function render(): View
    {
        return view('livewire.imports.index', [
            'files' => UploadedExcelFile::all(),
        ]);
    }
}
