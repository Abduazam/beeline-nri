<?php

namespace App\Services\Data\HardwareRoom\Update;

use App\Models\Data\HardwareRoom\HardwareRoom;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, HardwareRoom $hardware_room): void
    {
        try {
            DB::beginTransaction();

            $hardware_room->update([
                'title' => $data['hardware_room']['title'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
