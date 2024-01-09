<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationDiapasonInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            "room_type_id" => "Тип помещения",
            "hardware_room_id" => "Место размещения аппаратной",
            "hardware_owner_id" => "Совместная аппаратная владелец",
            "location_antenna_id" => "Место размещ. антенн",
            "height_afu" => "Высота объекта размещения АФУ, м",
            "general_contractor_id" => "Генеральный подрядчик",
            "type_ka" => "Тип К/А",
            "k_a_id" => "К/А",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_diapason_infos',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
