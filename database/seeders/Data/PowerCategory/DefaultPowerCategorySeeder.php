<?php

namespace Database\Seeders\Data\PowerCategory;

use App\Models\Data\PowerCategory\PowerCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultPowerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $power_categories = [
            '1 категория',
            '2 категория',
            '3 категория',
        ];

        foreach ($power_categories as $power_category) {
            PowerCategory::create([
                'title' => $power_category
            ]);
        }
    }
}
