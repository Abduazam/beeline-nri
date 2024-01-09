<?php

namespace Database\Seeders\Data\Controllers;

use App\Models\Data\Controllers\Controller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultControllersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $controllers = [
            [
                'region_id' => 1,
                'number' => 'K151005',
                'name' => 'BSC24 Tashkent',
                'address' => "город Ташкент",
            ],
            [
                'region_id' => 1,
                'number' => 'K151006',
                'name' => 'BSC25 Tashkent',
                'address' => "город Ташкент",
            ],
            [
                'region_id' => 1,
                'number' => 'K151007',
                'name' => 'BSC26 Tashkent',
                'address' => "город Ташкент",
            ],
            [
                'region_id' => 8,
                'number' => 'K151703',
                'name' => 'BSC32 Andijan',
                'address' => "Андижанская",
            ],
            [
                'region_id' => 10,
                'number' => 'K151601',
                'name' => 'BSC35 Namangan',
                'address' => "Наманганская",
            ],
            [
                'region_id' => 9,
                'number' => 'K151503',
                'name' => 'BSC42 Kokand',
                'address' => "Ферганская",
            ],
            [
                'region_id' => 1,
                'number' => 1004,
                'name' => 'RNC4-Tashkent',
                'address' => "город Ташкент",
            ],
            [
                'region_id' => 1,
                'number' => 1003,
                'name' => 'RNC3-Tashkent',
                'address' => "город Ташкент",
            ],
            [
                'region_id' => 3,
                'number' => 1801,
                'name' => 'RNC1_Karshi',
                'address' => "Кашкадарьинская",
            ],
        ];

        $number_positions = ['W', 'P'];
        $number = array_rand($number_positions);
        $positions = ['ATE-25', 'KBSC', 'KokandSwitch'];
        $position = array_rand($positions);

        foreach ($controllers as $controller) {
            Controller::create([
                'region_id' => $controller['region_id'],
                'number' => $controller['number'],
                'name' => $controller['name'],
                'number_position' => $number_positions[$number],
                'position' => $positions[$position],
                'address' => $controller['address'],
                'state_id' => 3,
            ]);
        }
    }
}
