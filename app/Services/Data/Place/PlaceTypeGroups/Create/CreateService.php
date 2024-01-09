<?php

namespace App\Services\Data\Place\PlaceTypeGroups\Create;

use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroupTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateService
{
    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $group = PlaceTypeGroup::create(['place_type_id' => $data['type_id']]);

            foreach ($data['data'] as $key => $value) {
                PlaceTypeGroupTranslation::create([
                    'place_type_group_id' => $group->id,
                    'locale' => $key,
                    'name' => $value
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
