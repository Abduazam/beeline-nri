<?php

namespace App\Http\Livewire\Widget\TableColumns;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Widget\Language;
use Illuminate\Support\Facades\DB;
use App\Models\Widget\TableColumnName;
use App\Traits\Livewire\WithDispatching;
use Illuminate\Validation\ValidationException;
use App\Services\Widget\TableColumns\Update\UpdateService;

class Edit extends Component
{
    use WithDispatching;

    public ?string $table = null;
    public array $data = [];

    protected array $rules = [
        'table' => ['required', 'string'],
        'data' => ['required', 'array'],
        'data.*' => ['required', 'array'],
        'data.*.*' => ['required', 'string'],
    ];

    public function mount(): void
    {
        $languages = Language::query()->get();
        foreach ($languages as $language) {
            $columns = TableColumnName::query()->where('table_name', $this->table)->where('locale', $language->slug)->get();
            foreach ($columns as $column) {
                $this->data[$language->slug][$column->column_name] = $column->translation;
            }
        }
    }

    /**
     * @throws Exception
     */
    public function update(UpdateService $service)
    {
        try {
            $validatedData = $this->validate();

            $service->update($validatedData);

            return redirect()->route('widget.table-columns.show', $this->table);
        } catch (ValidationException $e) {
            $this->dispatchError($e);
        }
    }

    public function render(): View
    {
        $languages = Language::query()->get();
        $columns = DB::select("SHOW COLUMNS FROM $this->table");

        return view('livewire.widget.table-columns.edit', compact('languages', 'columns'));
    }
}
