<?php

namespace Database\Seeders\Data\Place;

use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceType\PlaceTypeTranslation;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroupTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Здание' =>  [
                'Здание',
            ],
            'Метро' => [
                'Станция',
                'Перетаскивание',
            ],
            'Сооружение' => [
                'Ангар',
                'Башня',
                'Строительный вагончик',
                'Столб',
                'Колодец',
                'Труба/вышка',
                'Контейнер',
            ],
        ];

        foreach ($types as $type => $groups) {
            $new_type = PlaceType::create();
            PlaceTypeTranslation::create([
                'place_type_id' => $new_type->id,
                'locale' => app()->getLocale(),
                'name' => $type
            ]);

            foreach ($groups as $group) {
                $new_group = PlaceTypeGroup::create(['place_type_id' => $new_type->id]);
                PlaceTypeGroupTranslation::create([
                    'place_type_group_id' => $new_group->id,
                    'locale' => app()->getLocale(),
                    'name' => $group
                ]);
            }
        }
    }
}
