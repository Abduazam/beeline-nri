<?php

namespace App\Services\Widget\TableColumns\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Widget\TableColumnName;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data): void
    {
        try {
            DB::beginTransaction();

            $table = $data['table'];
            foreach ($data['data'] as $lang => $columns) {
                foreach ($columns as $column_name => $value) {
                    $table_column = TableColumnName::query()
                        ->where('table_name', $table)
                        ->where('locale', $lang)
                        ->where('column_name', $column_name)->first();
                    $table_column?->update(['translation' => $value]);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
