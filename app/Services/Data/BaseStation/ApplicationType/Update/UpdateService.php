<?php

namespace App\Services\Data\BaseStation\ApplicationType\Update;

use App\Models\Data\BaseStation\ApplicationType\BaseStationApplicationType;
use App\Models\Data\BaseStation\ApplicationType\BaseStationApplicationTypeTranslation;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, BaseStationApplicationType $type): void
    {
        try {
            DB::beginTransaction();

            $translations = BaseStationApplicationTypeTranslation::query()
                ->where('base_station_application_type_id', $type->id)
                ->whereIn('locale', array_keys($data))
                ->get()
                ->keyBy('locale');

            foreach ($data as $key => $value) {
                $translation = $translations[$key] ?? null;

                if ($translation && $translation->name !== $value) {
                    $translation->update(['name' => $value]);
                }
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
