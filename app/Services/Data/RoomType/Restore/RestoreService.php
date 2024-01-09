<?php

namespace App\Services\Data\RoomType\Restore;

use App\Models\Data\RoomType\RoomType;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(RoomType $room_type): void
    {
        try {
            DB::beginTransaction();

            $room_type->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
