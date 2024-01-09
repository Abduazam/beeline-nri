<?php

namespace App\Services\Data\Position\State\Update;

use App\Models\Data\Position\State\State;
use App\Models\Data\Position\State\StateTranslation;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, State $status): void
    {
        try {
            DB::beginTransaction();

            $translations = StateTranslation::query()
                ->where('state_id', $status->id)
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
