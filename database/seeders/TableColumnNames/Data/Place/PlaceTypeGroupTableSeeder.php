<?php

namespace Database\Seeders\TableColumnNames\Data\Place;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceTypeGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "place_type_id" => "Тип",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'place_type_groups',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }

        $data2 = [
            "id" => "ИД",
            "place_type_group_id" => "Группа ИД",
            "locale" => "Язык",
            "name" => "Название",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data2 as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'place_type_group_translations',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
