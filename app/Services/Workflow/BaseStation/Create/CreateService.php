<?php

namespace App\Services\Workflow\BaseStation\Create;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
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

            BaseStationWorkflow::create($data);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
