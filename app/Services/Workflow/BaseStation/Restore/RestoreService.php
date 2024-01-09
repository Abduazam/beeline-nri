<?php

namespace App\Services\Workflow\BaseStation\Restore;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(BaseStationWorkflow $workflow): void
    {
        try {
            DB::beginTransaction();

            $workflow->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
