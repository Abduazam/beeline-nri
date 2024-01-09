<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationAntennaControlUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            'rru_control' => "Управляется через RRU",
            'antenna_id' => "Антенны",
            'rru_id' => "Номер RRU",
            'mcu_id' => "Номер MCU",
            'motor_id' => "Тип мотора",
            'i_cable_id' => "Тип кабеля (I)",
            'o_cable_id' => "Тип кабеля (O)",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_antenna_control_units',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
