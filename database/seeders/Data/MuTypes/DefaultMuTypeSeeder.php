<?php

namespace Database\Seeders\Data\MuTypes;

use App\Models\Data\MuTypes\MuType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultMuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mu_types = [
            [
                'title' => "MU_Tek2",
                'model' => "MU_Tek2",
                'diapasons' => "900, 1800, 2100",
            ],
            [
                'title' => "Базовая станция",
                'model' => "micro R8SS6501",
                'manufacturer' => "Ericson",
                'diapasons' => "1800, 2100",
            ],
            [
                'title' => "Базовая станция",
                'model' => "Micro FlexZone FWHM",
                'manufacturer' => "Nokia",
            ],
        ];

        foreach ($mu_types as $mu_type) {
            MuType::create($mu_type);
        }
    }
}
