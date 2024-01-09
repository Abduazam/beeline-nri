<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationRadioModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            "rru_number" => "Номер RRU",
            "rru_type" => "Тип RRU",
            "sectors" => "Сектора",
            "control_module_id" => "Номер MU",
            "transceivers" => "Трансиверы",
            "optical_cable_id" => "Тип оптического кабеля",
            "optical_cable_number" => "Количество оптических кабелей",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_radio_modules',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
