<?php

namespace App\Services\Data\LocationAntenna\Delete;

use App\Models\Data\LocationAntenna\LocationAntenna;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(LocationAntenna $location_antenna): void
    {
        try {
            DB::beginTransaction();

            $location_antenna->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
