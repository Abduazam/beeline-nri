<?php

namespace Database\Seeders\TableColumnNames\Area;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "region_id" => "Регион",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'areas',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }

        $data2 = [
            "id" => "ИД",
            "area_id" => "Область",
            "locale" => "Язык",
            "name" => "Название",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data2 as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'area_translations',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
