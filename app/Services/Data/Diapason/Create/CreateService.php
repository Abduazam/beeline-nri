<?php

namespace App\Services\Data\Diapason\Create;

use App\Models\Data\Diapason\Diapason;
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

            Diapason::create([
                'technology_id' => $data['technology_id'],
                'band' => $data['band']
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
