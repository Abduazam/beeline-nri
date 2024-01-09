<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationCabinetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            "bts_type" => "Тип BTS",
            "bts_number" => "Номер BTS",
            "bs_name_nms" => "BSNameNMS",
            "transceivers_number" => "Кол-во трансиверов",
            "e1_threads_number" => "Кол-во потоков E1",
            "mb" => "Mb",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_cabinets',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
