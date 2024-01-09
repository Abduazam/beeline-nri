<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectOfmPoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            'project_target' => "Цель проекта",
            'project_type' => "Тип проекта",
            'range_selection' => "Выбор диапазонов",
            'project_documents' => "Выбор документов проекта",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'project_ofm_pos',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
