<?php

namespace Database\Seeders\Data\Position;

use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\ApplicationType\ApplicationTypeTranslation;
use Illuminate\Database\Seeder;

class DefaultApplicationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'position' => [
                'create' => 'Создание позиции',
                'edit' => 'Коррекция позиции',
                'delete' => 'Удаление позиции',
            ],
            'base-station' => [
                'construction' => 'Строительство БС',
                'construction-vehicle-position' => 'Строительство позиции ТС',
                'modernization' => 'Модернизация БС',
            ],
        ];

        foreach ($types as $for => $aimValues) {
            foreach ($aimValues as $aim => $value) {
                $new = ApplicationType::create([
                    'aim' => $aim,
                    'for' => $for,
                ]);

                ApplicationTypeTranslation::create([
                    'application_type_id' => $new->id,
                    'locale' => app()->getLocale(),
                    'name' => $value,
                ]);
            }
        }
    }
}
