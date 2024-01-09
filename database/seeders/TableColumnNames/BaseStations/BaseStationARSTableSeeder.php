<?php

namespace Database\Seeders\TableColumnNames\BaseStations;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Seeder;

class BaseStationARSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            'base_station_id' => "БС",
            'lead_operator_id' => "Ведущий оператор",
            'infrastructure_owner_id' => "Владелец инфраструктуры",
            'second_operator_number' => "Номер второго оператор",
            'contractor_for_reinforcement' => "Подрядчик для работ по усилениям",
            'rrl_response_part_id' => "Усиление ответной части РРЛ",
            'rns_need_id' => "Необходимость усиления РНС",
            'rns_result_id' => "Результат РНС",
            'strength_possibility_id' => "Возможность усиления",
            'rental_agreement_id' => "Наличие договора аренды",
            'electricity_specification_id' => "Наличие ТУ на электроэнергию",
            'placement_specification_id' => "Наличие ТУ на размещение",
            'placement_required_id' => "Требуются ТУ на размещение",
            'financial_category_position_id' => "Финансовая категория позиции",
            'power_category' => "Категория электропитания",
            'wind_farm_specification_id' => "Необходимость получения ТУ на ВЭС",
            'energy_department_comment' => "Комментарий отдела энергетики",
            'power_backup' => "Наличие резервирования питания",
            'lighting_lights' => "Наличие осветительных огней",
            'vehicle_cable_id' => "Волновое сопротивление кабелей к ТС",
            'number' => "Номер PO",
            'additional_information' => "Дополнительная информация",
            'cabinets_number' => "Количество радио-шкафов (кабинетов, стоек)",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'base_station_a_r_s',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
