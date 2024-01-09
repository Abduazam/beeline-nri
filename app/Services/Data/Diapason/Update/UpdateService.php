<?php

namespace App\Services\Data\Diapason\Update;

use App\Models\Data\Diapason\Diapason;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, Diapason $diapason): void
    {
        try {
            DB::beginTransaction();

            $diapason->update([
                'technology_id' => $data['diapason']['technology_id'],
                'band' => $data['diapason']['band'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
