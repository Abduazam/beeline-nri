<?php

namespace App\Services\Data\Position\ApplicationType\Update;

use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\ApplicationType\ApplicationTypeTranslation;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, ApplicationType $type): void
    {
        try {
            DB::beginTransaction();

            $translations = ApplicationTypeTranslation::query()
                ->where('application_type_id', $type->id)
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
