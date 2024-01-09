<?php

namespace Database\Seeders\Data\Coordinate;

use App\Models\Data\Coordinate\CoordinateType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultCoordinateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'WGS-84',
            'Pulkovo-42',
        ];

        foreach ($types as $type) {
            CoordinateType::create([
                'name' => $type
            ]);
        }
    }
}
