<?php

namespace App\Services\Data\Technology\Restore;

use App\Models\Data\Technology\Technology;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(Technology $technology): void
    {
        try {
            DB::beginTransaction();

            $technology->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
