<?php

namespace App\Services\Data\CoordinateType\Create;

use App\Models\Data\Coordinate\CoordinateType;
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

            CoordinateType::create([
                'name' => $data['name']
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
