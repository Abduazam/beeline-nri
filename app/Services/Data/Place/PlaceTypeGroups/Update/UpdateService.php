<?php

namespace App\Services\Data\Place\PlaceTypeGroups\Update;

use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroupTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data, PlaceTypeGroup $group): void
    {
        try {
            DB::beginTransaction();

            if ($group->place_type_id != $data['type_id']) {
                $group->update(['place_type_id' => $data['type_id']]);
            }

            $translations = PlaceTypeGroupTranslation::query()
                ->where('place_type_group_id', $group->id)
                ->whereIn('locale', array_keys($data['data']))
                ->get()
                ->keyBy('locale');

            foreach ($data['data'] as $key => $value) {
                $translation = $translations[$key] ?? null;

                if ($translation && $translation->name !== $value) {
                    $translation->update(['name' => $value]);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
