<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationTransportNetworkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            'link_to_prts' => "Связать проект с ПРТС",
            'responsible_user_id' => "Ответственный за ведение ИД по ТС",
            'gfc_node' => "ГФК узла",
            'correct_id' => "ИД корректны",
            'vehicle_type_id' => "Тип ТС",
            'position_set_id' => "Комплект позиции",
            'line_status_id' => "Статус линии",
            'line_number' => "№ линии",
            'landowner' => "Арендодатель",
            'equipment_type' => "Тип оборудования",
            'interface' => "Интерфейс",
            'tdm_band' => "Полоса TDM, Mbps",
            'ip_band' => "Полоса IP, Mbps",
            'generalization_frequency' => "Обобщ. частота, ГГц",
            'speed' => "Скорость, Мбит/с",
            'antenna_diameter_in_ta' => "Диаметр антенны в т.А, м",
            'antenna_diameter_in_ta_2' => "Диаметр 2 антенны в т.А, м",
            'suspension_height_in_ta' => "Высота подвеса в т.А",
            'suspension_height_in_ta_2' => "Высота 2 подвеса в т.А",
            'power' => "Мощность, Вт",
            'azimuth_a' => "Азимут А, гр",
            'reservation' => "Резервирование",
            'node_code' => "Код узла",
            'item_code' => "Код позиции",
            'response_title' => "Наименование ответки",
            'response_kit' => "Комплект ответки",
            'response_latitude' => "Широта ответки",
            'response_longitude' => "Долгота ответки",
            'antenna_diameter_in_tb' => "Диаметр антенны в т.Б, м",
            'antenna_diameter_in_tb_2' => "Диаметр 2 антенны в т.Б, м",
            'suspension_height_in_tb' => "Высота подвеса в т.Б",
            'suspension_height_in_tb_2' => "Высота 2 подвеса в т.Б",
            'azimuth_b' => "Азимут Б, гр",
            'change_date' => "Дата изменения фактических параметров высот",
            'range' => "Дальность, км",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_transport_networks',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
