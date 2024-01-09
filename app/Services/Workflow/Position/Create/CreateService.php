<?php

namespace App\Services\Workflow\Position\Create;

use App\Models\Workflow\Position\PositionWorkflow;
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

            PositionWorkflow::create($data);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
