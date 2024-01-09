<?php

namespace Database\Seeders\Data\ICables;

use App\Models\Data\ICables\ICable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultICableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iCables = [
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

        foreach ($iCables as $iCable) {
            ICable::create($iCable);
        }
    }
}
