<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationProjectOplTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            'source' => "Источник",
            'diapasons' => "Диапазон",
            'number' => "Номер",
            'created_date' => "Дата создания",
            'status' => "Статус",
            'description' => "Описание",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_project_opls',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
