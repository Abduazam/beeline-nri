<?php

namespace Database\Seeders\Data\Purpose;

use App\Models\Data\Purpose\Purpose;
use App\Models\Data\Purpose\PurposeTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $purposes = [
            'Контроллер',
            'Базовая станция',
            'Репитер',
            'Коммутатор',
        ];

        foreach ($purposes as $purpose) {
            $new = Purpose::create();
            PurposeTranslation::create([
                'purpose_id' => $new->id,
                'locale' => app()->getLocale(),
                'name' => $purpose,
            ]);
        }
    }
}
