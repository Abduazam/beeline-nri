<?php

namespace App\Services\Data\RoomType\Update;

use App\Models\Data\RoomType\RoomType;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, RoomType $room_type): void
    {
        try {
            DB::beginTransaction();

            $room_type->update([
                'title' => $data['room_type']['title'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
