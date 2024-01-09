<?php

namespace App\Services\Data\Technology\Delete;

use App\Models\Data\Technology\Technology;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(Technology $technology): void
    {
        try {
            DB::beginTransaction();

            $technology->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
