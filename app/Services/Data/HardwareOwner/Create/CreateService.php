<?php

namespace App\Services\Data\HardwareOwner\Create;

use App\Models\Data\HardwareOwner\HardwareOwner;
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

            HardwareOwner::create([
                'title' => $data['title']
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
