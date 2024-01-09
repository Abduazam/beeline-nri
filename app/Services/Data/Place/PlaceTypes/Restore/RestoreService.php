<?php

namespace App\Services\Data\Place\PlaceTypes\Restore;

use App\Models\Data\Place\PlaceType\PlaceType;
use Exception;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(PlaceType $type): void
    {
        try {
            DB::beginTransaction();

            $type->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
