<?php

namespace App\Services\Area\Regions\Update;

use App\Models\Area\Region\Region;
use App\Models\Area\Region\RegionTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data, Region $region): void
    {
        try {
            DB::beginTransaction();

            if ($region->branch_id != $data['branch_id']) {
                $region->update(['branch_id' => $data['branch_id']]);
            }

            $translations = RegionTranslation::query()
                ->where('region_id', $region->id)
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
