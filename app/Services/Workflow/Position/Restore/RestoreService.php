<?php

namespace App\Services\Workflow\Position\Restore;

use App\Models\Workflow\Position\PositionWorkflow;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(PositionWorkflow $workflow): void
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
