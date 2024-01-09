<?php

namespace App\Services\Data\RoomType\Create;

use App\Models\Data\RoomType\RoomType;
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

            RoomType::create([
                'title' => $data['title']
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
