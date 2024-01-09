<?php

namespace Database\Seeders\TableColumnNames\Position;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
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
                'table_name' => 'companies',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }

        $data2 = [
            "id" => "ИД",
            "company_id" => "Компания",
            "locale" => "Язык",
            "name" => "Название",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data2 as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'company_translations',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
