<?php

namespace App\Services\Data\HardwareOwner\Restore;

use App\Models\Data\HardwareOwner\HardwareOwner;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(HardwareOwner $hardware_owner): void
    {
        try {
            DB::beginTransaction();

            $hardware_owner->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
