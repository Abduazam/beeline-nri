<?php

namespace Database\Seeders\Data\LocationAntenna;

use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Models\Data\LocationAntenna\LocationAntenna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultLocationAntennaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location_antennas = [
            'Башня',
            'Труба',
            'Мачта',
            'Крыша',
            'Стена здания',
        ];

        foreach ($location_antennas as $location_antenna) {
            LocationAntenna::create([
                'title' => $location_antenna
            ]);
        }
    }
}
