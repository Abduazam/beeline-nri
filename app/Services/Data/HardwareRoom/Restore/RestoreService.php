<?php

namespace App\Services\Data\HardwareRoom\Restore;

use App\Models\Data\HardwareRoom\HardwareRoom;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(HardwareRoom $hardware_room): void
    {
        try {
            DB::beginTransaction();

            $hardware_room->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
