<?php

namespace Database\Seeders\TableColumnNames\Position\Positions;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "Позиции номер",
            "source" => "Источник",
            "company_id" => "Компания",
            "place_type_id" => "Тип",
            "place_type_group_id" => "Группа",
            "purpose_id" => "Назначение",
            "region_id" => "Регион",
            "area_id" => "Область",
            "name" => "Название",
            "territory_id" => "Территория",
            "address" => "Адрес",
            "coordinate_id" => "Координаты",
            "latitude" => "Широта",
            "longitude" => "Долгота",
            "state_id" => "Состояние",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'positions',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
