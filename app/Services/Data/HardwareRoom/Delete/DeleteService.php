<?php

namespace App\Services\Data\HardwareRoom\Delete;

use App\Models\Data\HardwareRoom\HardwareRoom;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(HardwareRoom $hardware_room): void
    {
        try {
            DB::beginTransaction();

            $hardware_room->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
