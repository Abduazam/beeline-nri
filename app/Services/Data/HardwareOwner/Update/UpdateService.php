<?php

namespace App\Services\Data\HardwareOwner\Update;

use App\Models\Data\HardwareOwner\HardwareOwner;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, HardwareOwner $hardware_owner): void
    {
        try {
            DB::beginTransaction();

            $hardware_owner->update([
                'title' => $data['hardware_owner']['title'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
