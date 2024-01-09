<?php

namespace App\Services\Data\GeneralContractor\Delete;

use App\Models\Data\GeneralContractor\GeneralContractor;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(GeneralContractor $general_contractor): void
    {
        try {
            DB::beginTransaction();

            $general_contractor->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
