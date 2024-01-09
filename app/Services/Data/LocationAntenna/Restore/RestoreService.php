<?php

namespace App\Services\Data\LocationAntenna\Restore;

use App\Models\Data\LocationAntenna\LocationAntenna;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(LocationAntenna $location_antenna): void
    {
        try {
            DB::beginTransaction();

            $location_antenna->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
