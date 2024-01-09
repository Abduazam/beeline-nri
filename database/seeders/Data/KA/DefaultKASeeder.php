<?php

namespace Database\Seeders\Data\KA;

use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Models\Data\KA\KA;
use App\Models\Data\LocationAntenna\LocationAntenna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultKASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kas = [

        ];

        foreach ($kas as $ka) {
            KA::create([
            ]);
        }
    }
}
