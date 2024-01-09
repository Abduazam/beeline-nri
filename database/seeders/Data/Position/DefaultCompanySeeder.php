<?php

namespace Database\Seeders\Data\Position;

use App\Models\Data\Position\Company\Company;
use App\Models\Data\Position\Company\CompanyTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            'Позиции Вымпелком',
            'Позиции аренды каналов',
        ];

        foreach ($companies as $purpose) {
            $new = Company::create();
            CompanyTranslation::create([
                'company_id' => $new->id,
                'locale' => app()->getLocale(),
                'name' => $purpose,
            ]);
        }
    }
}
