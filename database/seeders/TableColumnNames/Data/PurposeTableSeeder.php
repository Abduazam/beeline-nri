<?php

namespace Database\Seeders\TableColumnNames\Data;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'purposes',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }

        $data2 = [
            "id" => "ИД",
            "purpose_id" => "Назначение ИД",
            "locale" => "Язык",
            "name" => "Название",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data2 as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'purpose_translations',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
