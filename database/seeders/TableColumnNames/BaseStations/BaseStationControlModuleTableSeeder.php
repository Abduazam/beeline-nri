<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationControlModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            "mu_type" => "Тип MU",
            "my_number" => "Номер MU",
            "room_type_id" => "Расположение MU",
            "cabinet_id" => "Номер BTS",
            "bs_name_nms" => "BSNameNMS",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_control_modules',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
