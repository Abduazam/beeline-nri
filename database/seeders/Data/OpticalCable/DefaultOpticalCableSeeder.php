<?php

namespace Database\Seeders\Data\OpticalCable;

use App\Models\Data\OpticalCable\OpticalCable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultOpticalCableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $optical_cables = [
            'CB-E1-120',
            'CB-E2-120',
            'CB-E1-125',
            'CB-E2-130',
        ];

        foreach ($optical_cables as $optical_cable) {
            OpticalCable::create([
                'title' => $optical_cable
            ]);
        }
    }
}
