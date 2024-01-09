<?php

namespace App\Services\Data\HardwareRoom\Create;

use App\Models\Data\HardwareRoom\HardwareRoom;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateService
{
    /**
     * @throws Throwable
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            HardwareRoom::create([
                'title' => $data['title']
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
