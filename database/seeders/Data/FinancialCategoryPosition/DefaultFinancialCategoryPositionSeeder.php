<?php

namespace Database\Seeders\Data\FinancialCategoryPosition;

use App\Models\Data\FinancialCategoryPosition\FinancialCategoryPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultFinancialCategoryPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $financial_category_positions = [
            'Indoor - Outdoor',
            'Позиции в метро',
            'Бащня ВК на земле (9<=метров<40)',
        ];

        foreach ($financial_category_positions as $financial_category_position) {
            FinancialCategoryPosition::create([
                'title' => $financial_category_position
            ]);
        }
    }
}
