<?php

namespace App\Services\Data\CoordinateType\Update;

use App\Models\Data\Coordinate\CoordinateType;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, CoordinateType $type): void
    {
        try {
            DB::beginTransaction();

            $type->update(['name' => $data['type']['name']]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
