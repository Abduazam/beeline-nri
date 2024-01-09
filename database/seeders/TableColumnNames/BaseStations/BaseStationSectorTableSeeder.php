<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationSectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "base_station_id" => "БС",
            "rssh" => "Рсш",
            "sector_number" => "Полный номер сектора",
            "cell_id" => "CellId",
            "diapason_id" => "Диапазон сектора",
            "title" => "Наименование",
            "e_node_b_id" => "ENodeB",
            "transceivers" => "Трансиверы",
            "drate_transceivers" => "Трансиверов DRate (HR)",
            "bts_number" => "Номер BTS",
            "rru_id" => "Номер RRU",
            "antenna_number" => "Кол-во антенн в секторе",
            "azimuth" => "Азимут сектора",
            "metro" => "В метро",
            "lna_availability" => "Наличие МШУ",
            "lna_type" => "Тип МШУ",
            "lna_number" => "Количество МШУ",
            "duplex_filter_id" => "Тип дуплексного фильтра",
            "duplex_filter_number" => "Количество фильтров",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_sectors',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
