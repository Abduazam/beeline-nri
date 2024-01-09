<?php

namespace App\Services\Data\RoomType\Delete;

use App\Models\Data\RoomType\RoomType;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(RoomType $room_type): void
    {
        try {
            DB::beginTransaction();

            $room_type->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
