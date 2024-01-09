<?php

namespace App\Http\Livewire\Imports;

use App\Imports\Dashboard\BaseStations\BaseStation\BaseStation;
use App\Models\Imports\Excel\UploadedExcelFile;
use App\Traits\Livewire\WithDispatching;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcel extends Component
{
    use WithFileUploads, WithDispatching;

    public mixed $file = null;

    protected $listeners = [
        'import' => 'import',
    ];

    public function upload(): void
    {
        $filename = $this->file->getClientOriginalName();
        $uploadedFile = UploadedExcelFile::where('title', $filename)->first();

        if (!$uploadedFile) {
            $this->dispatchBrowserEvent('inProcess');
            if (!is_null($this->file)) {
                $this->emit('import');
            }
        } else {
            $this->dispatchBrowserEvent('dispatch-event', [
                'icon' => "fa fa-circle-exclamation text-warning",
                'title' => "Предупреждение",
                'content' => "<b>Файл:</b> " . $filename . " уже загружен.",
            ]);
        }
    }

    public function import(): void
    {
        $import = new BaseStation();
        $import->onlySheets('Проекты', 'Источники питания БС и УЗО', 'Шкафы', 'Модули управления расп. БС (MU)', 'Радиомодули расп. БС (RRU)', 'Сектора', 'Антенны', 'Модули управления (MCU)', 'Блоки RET (RCU)');

        $response = Excel::import($import, $this->file);
        if ($response) {
            $filename = $this->file->getClientOriginalName();
            UploadedExcelFile::create(['title' => $filename]);

            $this->dispatchBrowserEvent('endProcess');
            $this->dispatchSuccess('create', 'creating-succeed', "Импорт завершен");
        }
    }

    public function render(): View
    {
        return view('livewire.imports.import-excel');
    }
}
