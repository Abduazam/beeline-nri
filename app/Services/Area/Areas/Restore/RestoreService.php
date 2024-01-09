<?php

namespace App\Services\Area\Areas\Restore;

use App\Models\Area\Area\Area;
use Exception;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(Area $area): void
    {
        try {
            DB::beginTransaction();

            $area->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
