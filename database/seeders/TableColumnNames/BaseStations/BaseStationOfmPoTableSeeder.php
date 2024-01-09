<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationOfmPoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            'bs_number' => "Номер БС",
            'diapason_id' => "Диапазон",
            'po_number' => "Номер PO",
            'ofm_number' => "Номер OFM",
            'po_project' => "Проект PO",
            'ofm_project' => "Проект OFM",
            'status_ofm_project' => "Статус проекта OFM",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_ofm_pos',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
