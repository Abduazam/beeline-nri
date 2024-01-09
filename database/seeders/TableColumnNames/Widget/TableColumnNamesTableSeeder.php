<?php

namespace Database\Seeders\TableColumnNames\Widget;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableColumnNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "locale" => "Язык",
            "table_name" => "Имя таблицы",
            "column_name" => "Имя столбца",
            "translation" => "Перевод",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в"
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'table_column_names',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
