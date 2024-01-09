<?php

namespace App\Services\Data\Technology\Update;

use App\Models\Data\Technology\Technology;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, Technology $technology): void
    {
        try {
            DB::beginTransaction();

            $technology->update([
                'code' => $data['technology']['code'],
                'name' => $data['technology']['name'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
