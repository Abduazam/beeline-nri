<?php

namespace App\Services\Area\Areas\Update;

use App\Models\Area\Area\Area;
use App\Models\Area\Area\AreaTranslation;
use App\Models\Area\Region\Region;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function edit(array $data, Area $area): void
    {
        try {
            DB::beginTransaction();

            $region = Region::query()->where('id', $data['region_id'])->where('branch_id', $data['branch_id'])->first();
            if ($region) {
                if ($area->region_id != $data['region_id']) {
                    $area->update(['region_id' => $region->id]);
                }

                $translations = AreaTranslation::query()
                    ->where('area_id', $area->id)
                    ->whereIn('locale', array_keys($data['data']))
                    ->get()
                    ->keyBy('locale');

                foreach ($data['data'] as $key => $value) {
                    $translation = $translations[$key] ?? null;

                    if ($translation && $translation->name !== $value) {
                        $translation->update(['name' => $value]);
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
