<?php

namespace App\Services\Data\CoordinateType\Delete;

use App\Models\Data\Coordinate\CoordinateType;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(CoordinateType $type): void
    {
        try {
            DB::beginTransaction();

            $type->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
