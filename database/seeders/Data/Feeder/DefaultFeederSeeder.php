<?php

namespace Database\Seeders\Data\Feeder;

use App\Models\Data\AntennaTransmission\AntennaTransmission;
use App\Models\Data\Feeder\Feeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultFeederSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feeders = [
            'DC Cable',
            'LCF-12-50 J',
            'LDF4-50A'
        ];

        foreach ($feeders as $feeder) {
            Feeder::create([
                'title' => $feeder
            ]);
        }
    }
}
