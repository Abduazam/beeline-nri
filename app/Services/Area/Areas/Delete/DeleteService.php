<?php

namespace App\Services\Area\Areas\Delete;

use App\Models\Area\Area\Area;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteService
{
    /**
     * @throws Exception
     */
    public function delete(Area $area): void
    {
        try {
            DB::beginTransaction();

            $area->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
