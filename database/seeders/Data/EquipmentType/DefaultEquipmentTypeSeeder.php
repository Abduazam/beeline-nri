<?php

namespace Database\Seeders\Data\EquipmentType;

use App\Models\Data\EquipmentType\EquipmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultEquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipment_types = [
            [
                'resource_code' => "20099",
                'designation' => "Huawei 7 GHZ",
                'title' => "Комплект оборудования РРЛ",
            ],
            [
                'resource_code' => "21199",
                'manufacturer_code' => "Huawei 26 GHz",
                'designation' => "Huawei 26 GHZ",
                'title' => "Комплект оборудования РРЛ",
            ],
        ];

        foreach ($equipment_types as $equipment_type) {
            EquipmentType::create($equipment_type);
        }
    }
}
