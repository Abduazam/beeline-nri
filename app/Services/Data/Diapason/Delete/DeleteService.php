<?php

namespace App\Services\Data\Diapason\Delete;

use App\Models\Data\Diapason\Diapason;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(Diapason $diapason): void
    {
        try {
            DB::beginTransaction();

            $diapason->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
