<?php

namespace App\Services\Data\HardwareOwner\Delete;

use App\Models\Data\HardwareOwner\HardwareOwner;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(HardwareOwner $hardware_owner): void
    {
        try {
            DB::beginTransaction();

            $hardware_owner->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
