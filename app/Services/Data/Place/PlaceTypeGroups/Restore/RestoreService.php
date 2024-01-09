<?php

namespace App\Services\Data\Place\PlaceTypeGroups\Restore;

use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use Exception;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(PlaceTypeGroup $group): void
    {
        try {
            DB::beginTransaction();

            $group->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
