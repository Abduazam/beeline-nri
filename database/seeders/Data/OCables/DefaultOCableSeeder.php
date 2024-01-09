<?php

namespace Database\Seeders\Data\OCables;

use App\Models\Data\OCables\OCable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultOCableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oCables = [
            [
                'title' => "Кабел управления RET",
                'model' => "TY-RET-Cable-FM (30M)",
                'manufacturer' => "MODERN TECH COMMUNICATION",
            ],
            [
                'title' => "Кабел управления AISG",
                'model' => "1/TSR48421/15M",
                'manufacturer' => "Ericsson",
            ],
        ];

        foreach ($oCables as $oCable) {
            OCable::create($oCable);
        }
    }
}
