<?php

namespace App\Services\Data\Technology\Create;

use App\Models\Data\Technology\Technology;
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

            Technology::create([
                'code' => $data['code'],
                'name' => $data['name']
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
