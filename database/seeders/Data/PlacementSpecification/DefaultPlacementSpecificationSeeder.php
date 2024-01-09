<?php

namespace Database\Seeders\Data\PlacementSpecification;

use App\Models\Data\PlacementSpecification\PlacementSpecification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultPlacementSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $placement_specifications = [
            'Да',
            'Нет',
            'Присутствует в договоре'
        ];

        foreach ($placement_specifications as $placement_specification) {
            PlacementSpecification::create([
                'title' => $placement_specification
            ]);
        }
    }
}
