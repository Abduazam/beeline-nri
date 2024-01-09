<?php

namespace App\Services\Widget\TableColumns\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Widget\TableColumnName;

class CreateService
{
    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $table = $data['table'];
            foreach ($data['data'] as $lang => $columns) {
                foreach ($columns as $column_name => $value) {
                    TableColumnName::create([
                        'locale' => $lang,
                        'table_name' => $table,
                        'column_name' => $column_name,
                        'translation' => $value
                    ]);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
