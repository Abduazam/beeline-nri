<?php

namespace Database\Seeders\TableColumnNames\Data;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralContractorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "general_contractor_type_id" => "Тип",
            "inn" => "ИНН",
            "title" => "Наименование",
            "address" => "Адрес",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'general_contractors',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
