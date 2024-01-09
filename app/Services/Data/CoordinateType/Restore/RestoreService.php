<?php

namespace App\Services\Data\CoordinateType\Restore;

use App\Models\Data\Coordinate\CoordinateType;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(CoordinateType $type): void
    {
        try {
            DB::beginTransaction();

            $type->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
