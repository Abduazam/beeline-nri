<?php

namespace Database\Seeders\TableColumnNames\Widget;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "key" => "Ключ",
            "locale" => "Язык",
            "translation" => "Перевод",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'text_names',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
