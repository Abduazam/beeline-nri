<?php

namespace Database\Seeders\TableColumnNames\Data;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Seeder;

class ControllerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            'region_id' => "Регион",
            'number' => "Номер",
            "name" => "Название",
            'gfk' => "ГФК",
            'number_position' => "Номер позиции",
            'position' => "Позиции",
            'address' => "Адрес",
            'state_id' => "Состояние",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'controllers',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
