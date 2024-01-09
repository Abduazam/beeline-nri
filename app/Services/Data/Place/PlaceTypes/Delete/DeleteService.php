<?php

namespace App\Services\Data\Place\PlaceTypes\Delete;

use App\Models\Data\Place\PlaceType\PlaceType;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteService
{
    public function delete(PlaceType $type): void
    {
        try {
            DB::beginTransaction();

            $type->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
