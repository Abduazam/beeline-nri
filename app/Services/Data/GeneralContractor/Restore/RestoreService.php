<?php

namespace App\Services\Data\GeneralContractor\Restore;

use App\Models\Data\GeneralContractor\GeneralContractor;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(GeneralContractor $general_contractor): void
    {
        try {
            DB::beginTransaction();

            $general_contractor->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
