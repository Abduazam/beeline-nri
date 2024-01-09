<?php

namespace App\Services\Data\LocationAntenna\Create;

use App\Models\Data\LocationAntenna\LocationAntenna;
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

            LocationAntenna::create([
                'title' => $data['title']
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
