<?php

namespace Database\Seeders\Data\Area;

use App\Models\Area\Area\Area;
use App\Models\Area\Area\AreaTranslation;
use App\Models\Area\Branch\Branch;
use App\Models\Area\Branch\BranchTranslation;
use App\Models\Area\Region\Region;
use App\Models\Area\Region\RegionTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultAllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            'ТРФ' => [
                'город Ташкент' => [
                    'code' => 10,
                    'areas' => [
                        "Бектемирский район",
                        "Чиланзарский район",
                        "Миробадский район",
                        "Мирзо Улугбекский район",
                        "Алмазарский район",
                        "Сергильский район",
                        "Шайхонтохурский район",
                        "Учтепинский район",
                        "Яккасарайский район",
                        "Яшнаабадский район",
                        "Юнусабадский район",
                    ],
                ],
                'Ташкентская область' => [
                    'code' => 11,
                    'areas' => [
                        "Ангрен Сити",
                        "Бекабад город",
                        "Бекабадский район",
                        "Бокский район",
                        "Бостонлик Район",
                        "Чинозский район",
                        "Город Чирчик",
                        "Средний Чирчикский район",
                        "Охангаронский район",
                        "Город Алмалык",
                        "Аккоргонский район",
                        "Паркентский район",
                        "Пискентский район",
                        "Кибрайский район",
                        "Нижний Чирчикский район",
                        "Янгиёлский район",
                        "Юкори Чирчикский район",
                        "Зангиатинский район"
                    ],
                ],
            ],
            'ЮРФ' => [
                'Кашкадарьинская' => [
                    'code' => 18,
                    'areas' => [],
                ],
                'Сурхандарьинская' => [
                    'code' => 19,
                    'areas' => [],
                ],
            ],
            'ЦРФ' => [
                'Джизакская' => [
                    'code' => 13,
                    'areas' => [],
                ],
                'Сырдарьинская' => [
                    'code' => 12,
                    'areas' => [],
                ],
                'Самаркандская' => [
                    'code' => 14,
                    'areas' => [],
                ],
            ],
            'ВРФ' => [
                'Андижанская' => [
                    'code' => 17,
                    'areas' => [],
                ],
                'Ферганская' => [
                    'code' => 15,
                    'areas' => [],
                ],
                'Наманганская' => [
                    'code' => 16,
                    'areas' => [],
                ],
            ],
            'ЮЗРФ' => [
                'Навоийская' => [
                    'code' => 21,
                    'areas' => [],
                ],
                'Бухарская' => [
                    'code' => 20,
                    'areas' => [],
                ],
            ],
            'ЗРФ' => [
                'Хорезмская' => [
                    'code' => 22,
                    'areas' => [],
                ],
                'Республика Каракалпакстан' => [
                    'code' => 23,
                    'areas' => [],
                ]
            ]
        ];

        foreach ($areas as $branch => $regions) {
            $new_branch = Branch::create();
            BranchTranslation::create([
                'branch_id' => $new_branch->id,
                'locale' => app()->getLocale(),
                'name' => $branch
            ]);

            foreach ($regions as $region => $area) {
                $new_region = Region::create([
                    'branch_id' => $new_branch->id,
                    'code' => $area['code'],
                ]);
                RegionTranslation::create([
                    'region_id' => $new_region->id,
                    'locale' => app()->getLocale(),
                    'name' => $region
                ]);

                foreach ($area['areas'] as $value) {
                    $new_area = Area::create(['region_id' => $new_region->id]);
                    AreaTranslation::create([
                        'area_id' => $new_area->id,
                        'locale' => app()->getLocale(),
                        'name' => $value
                    ]);
                }
            }
        }
    }
}
