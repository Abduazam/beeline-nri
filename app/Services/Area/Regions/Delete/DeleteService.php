<?php

namespace App\Services\Area\Regions\Delete;

use App\Models\Area\Region\Region;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteService
{
    public function delete(Region $region): void
    {
        try {
            DB::beginTransaction();

            $region->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
