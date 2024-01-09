<?php

namespace Database\Seeders\Data\BtsTypes;

use App\Models\Data\BtsTypes\BtsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultBtsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bts_types = [
            [
                'title' => "Шкаф базовой станции",
                'model' => "BTS3900L",
                'distribution' => "N",
            ],
            [
                'title' => "Шкаф базовой станции",
                'model' => "BTS_remote_site_hotel",
                'distribution' => "Y",
            ],
            [
                'title' => "Шкаф базовой станции",
                'model' => "DF34",
                'distribution' => "N",
            ],
        ];

        foreach ($bts_types as $bts_type) {
            BtsType::create($bts_type);
        }
    }
}
