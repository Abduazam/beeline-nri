<?php

namespace App\Http\Livewire\Widget\TableColumns;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Traits\Livewire\WithSearing;
use App\Models\Widget\TableColumnName;

class Index extends Component
{
    use WithSearing;

    protected $listeners = ['refresh' => '$refresh'];

    public function checkTable($table_name): bool
    {
        $table = TableColumnName::query()->where('table_name', $table_name)->first();
        if ($table) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        $search = $this->search ?? '';

        $query = "SELECT TABLE_NAME, COUNT(*) AS COLUMN_COUNT
          FROM INFORMATION_SCHEMA.COLUMNS
          WHERE TABLE_SCHEMA = '" . config('database.db_name') . "'
          AND TABLE_NAME NOT IN ('failed_jobs', 'migrations', 'model_has_permissions', 'password_reset_tokens', 'password_resets', 'personal_access_tokens')";

        if (!empty($search)) {
            $query .= " AND TABLE_NAME like '%" . $search . "%'";
        }

        $query .= " GROUP BY TABLE_NAME";

        $tables = DB::select($query);

        return view('livewire.widget.table-columns.index', compact('tables'));
    }
}
