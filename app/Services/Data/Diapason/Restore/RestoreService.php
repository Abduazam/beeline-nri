<?php

namespace App\Services\Data\Diapason\Restore;

use App\Models\Data\Diapason\Diapason;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(Diapason $diapason): void
    {
        try {
            DB::beginTransaction();

            $diapason->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
