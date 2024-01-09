<?php

namespace App\Services\Data\Place\PlaceTypeGroups\Delete;

use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use Illuminate\Support\Facades\DB;
use Exception;

class DeleteService
{
    /**
     * @throws Exception
     */
    public function delete(PlaceTypeGroup $group): void
    {
        try {
            DB::beginTransaction();

            $group->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
