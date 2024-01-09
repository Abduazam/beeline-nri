<?php

namespace App\Services\Data\Position\Status\Update;

use App\Models\Data\Position\Status\Status;
use App\Models\Data\Position\Status\StatusTranslation;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, Status $status): void
    {
        try {
            DB::beginTransaction();

            $translations = StatusTranslation::query()
                ->where('status_id', $status->id)
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
