<?php

namespace Database\Seeders\Data\ElectricitySpecification;

use App\Models\Data\ElectricitySpecification\ElectricitySpecification;
use App\Models\Data\RentalAgreement\RentalAgreement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultElectricitySpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electricity_specifications = [
            'Да',
            'Нет',
        ];

        foreach ($electricity_specifications as $electricity_specification) {
            ElectricitySpecification::create([
                'title' => $electricity_specification
            ]);
        }
    }
}
