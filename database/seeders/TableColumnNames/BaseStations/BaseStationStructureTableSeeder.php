<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationStructureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            'base_station_id' => "БС",
            "type_id" => "Тип",
            "structure_owner_id" => "Чье сооружение",
            "height" => "Высота",
            "structure_location_id" => "Место размещения",
            "height_afu" => "Высота подвеса АФУ для поиска",
            "height_rrl" => "Высота подвеса РРЛ для поиска",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_structures',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
