<?php

namespace Database\Seeders\Data\AntennaTransmission;

use App\Models\Data\AntennaTransmission\AntennaTransmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultAntennaTransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $antenna_transmissions = [
            'Outdoor',
        ];

        foreach ($antenna_transmissions as $antenna_transmission) {
            AntennaTransmission::create([
                'title' => $antenna_transmission
            ]);
        }
    }
}
