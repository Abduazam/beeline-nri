<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationAntennaEquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            'sectors' => "Сектора",
            'sector_number' => "Номер в сект",
            'antenna_type' => "Тип антенны",
            'meta_article' => "Мета-артикул",
            'top_antenna' => "Топ-антенна",
            'azimuth' => "Азимут",
            'suspension_height' => "Высота подвеса",
            'diapasons' => "Диапазон",
            'direction_diagram' => "Диаграмма направл",
            'direction_diagram_2' => "Диаграмма направл 2",
            'ku_antennas' => "КУ антенны",
            'bisector' => "Бисекторная",
            'electrical_tilt' => "Наклон антенн (электр.)",
            'mechanical_tilt' => "Наклон антенн (механ.)",
            'sum_tilts' => "Наклон антенн сумм.",
            'antenna_reception_id' => "Прием",
            'antenna_transmission_id' => "Передача",
            'feeder_id' => "Тип фидера",
            'feeder_length' => "Длина фидера",
            'latitude' => "Широта",
            'longitude' => "Долгота",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => '',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
