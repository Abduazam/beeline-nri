<?php

namespace App\Services\Data\Purpose\Update;

use App\Models\Data\Purpose\Purpose;
use App\Models\Data\Purpose\PurposeTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data, Purpose $purpose): void
    {
        try {
            DB::beginTransaction();

            $translations = PurposeTranslation::query()
                ->where('purpose_id', $purpose->id)
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
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
