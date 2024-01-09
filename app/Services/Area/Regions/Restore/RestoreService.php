<?php

namespace App\Services\Area\Regions\Restore;

use App\Models\Area\Region\Region;
use Exception;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(Region $region): void
    {
        try {
            DB::beginTransaction();

            $region->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
