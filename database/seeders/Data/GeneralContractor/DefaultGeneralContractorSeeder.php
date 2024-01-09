<?php

namespace Database\Seeders\Data\GeneralContractor;

use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Models\Data\GeneralContractor\GeneralContractorType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultGeneralContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $general_contractor_types = [
            'Поставщик' => [
                'inn' => '77',
                'title' => 'ООО "ТОМАС-МАРКЕТ',
            ],
            'Подрядчик' => [
                'inn' => '0',
                'title' => 'АРИАДНАБ ООО',
            ],
            'Арендодатель' => [
                'inn' => '7718142364',
                'title' => 'Вымпелком-Р',
            ],
        ];

        foreach ($general_contractor_types as $general_contractor_type => $general_contractor) {
            $gct = GeneralContractorType::create([
                'title' => $general_contractor_type
            ]);

            $gc_array = array_merge(['general_contractor_type_id' => $gct->id], $general_contractor);
            GeneralContractor::create($gc_array);
        }
    }
}
