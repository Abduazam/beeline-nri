<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationDiapasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            "number" => "Номер БС",
            "diapason_id" => "Диапазон",
            "controller_id" => "Контроллер",
            "is_new" => "Новый диапазон",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_diapasons',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
