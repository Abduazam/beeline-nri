<?php

namespace Database\Seeders\Data\RruTypes;

use App\Models\Data\RruTypes\RruType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultRruTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rru_types = [
            [
                'title' => "RRU_remote",
                'model' => "RRU_remote",
                'diapasons' => "900, 1800, 2100",
            ],
            [
                'title' => "Блок высокий радиоч.",
                'model' => "RRU 3939",
                'manufacturer' => "Huawei",
                'diapasons' => "2100",
            ],
            [
                'title' => "Блок высокий радиоч.",
                'model' => "RRU3939 900Mt-tz",
                'manufacturer' => "Huawei",
                'max_number_transceivers' => 8,
                'diapasons' => "900",
            ],
        ];

        foreach ($rru_types as $rru_type) {
            RruType::create($rru_type);
        }
    }
}
