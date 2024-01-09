<?php

namespace Database\Seeders\Data\Technologies;

use App\Models\Data\Diapason\Diapason;
use App\Models\Data\Technology\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'code' => 15,
                'name' => "GSM",
                'diapasons' => [
                    900,
                    1800
                ],
            ],
            [
                'code' => 55,
                'name' => "UMTS",
                'diapasons' => [
                    900,
                    2100
                ],
            ],
            [
                'code' => 75,
                'name' => "LTE",
                'diapasons' => [
                    800,
                    900,
                    1800,
                    2300,
                    2600,
                ],
            ],
        ];

        foreach ($technologies as $technology) {
            $newTech = Technology::create([
                'code' => $technology['code'],
                'name' => $technology['name'],
            ]);

            foreach ($technology['diapasons'] as $diapason) {
                Diapason::create([
                    'technology_id' => $newTech->id,
                    'band' => $diapason,
                ]);
            }
        }
    }
}
