<?php

namespace App\Services\Area\Branches\Update;

use Exception;
use App\Models\Area\Branch\Branch;
use Illuminate\Support\Facades\DB;
use App\Models\Area\Branch\BranchTranslation;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data, Branch $branch): void
    {
        try {
            DB::beginTransaction();

            $translations = BranchTranslation::query()
                ->where('branch_id', $branch->id)
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
