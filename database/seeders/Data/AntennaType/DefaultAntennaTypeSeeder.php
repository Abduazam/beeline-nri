<?php

namespace Database\Seeders\Data\AntennaType;

use App\Models\Data\AntennaTransmission\AntennaTransmission;
use App\Models\Data\AntennaType\AntennaType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultAntennaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $antenna_types = [
            [
                'title' => "Антенна",
                'model' => "K732149",
                'diapasons' => "800 | 900 | 1800 | 2100",
                'horizontal_diagram' => "90.0 | 90.0 | 90.0",
                'vertical_diagram' => "90.0 | 90.0 | 90.0",
                'ku_antenna' => "7.0 | 7.0 | 7.0",
                'electrical_tilt' => "0.0 | 0.0 | 0.0",
                'mechanical_tilt' => "0.0 | 0.0 | 0.0",
            ],
            [
                'title' => "Антенна",
                'model' => "T0004S6R082",
                'diapasons' => "1800 | 2100 | 2300 | 2600",
                'horizontal_diagram' => "66.0 | 65.0 | 62.0",
                'vertical_diagram' => "7.2 | 6.4 | 5.6",
                'ku_antenna' => "17.0 | 17.3 | 17.8",
                'electrical_tilt' => "2.0 | 2.0 | 2.0",
                'mechanical_tilt' => "2.0 | 2.0 | 2.0",
            ],
        ];

        foreach ($antenna_types as $antenna_type) {
            AntennaType::create($antenna_type);
        }
    }
}
