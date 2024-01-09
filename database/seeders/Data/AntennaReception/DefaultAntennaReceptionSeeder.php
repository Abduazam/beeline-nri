<?php

namespace Database\Seeders\Data\AntennaReception;

use App\Models\Data\AntennaReception\AntennaReception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultAntennaReceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $antenna_receptions = [
            'TR',
        ];

        foreach ($antenna_receptions as $antenna_reception) {
            AntennaReception::create([
                'title' => $antenna_reception
            ]);
        }
    }
}
