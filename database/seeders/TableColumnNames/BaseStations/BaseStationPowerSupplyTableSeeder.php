<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationPowerSupplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            'base_station_id' => "БС",
            'd' => "Д",
            'purpose' => "Назначение",
            'ip_type_id' => "Тип ИП",
            'ip_manufacturer_id' => "Производитель ИП",
            'battery_type_id' => "Тип АКБ",
            'power' => "Мощность",
            'voltage' => "Напряжение",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_power_supplies',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
