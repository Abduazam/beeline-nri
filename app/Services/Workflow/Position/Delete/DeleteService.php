<?php

namespace App\Services\Workflow\Position\Delete;

use App\Models\Workflow\Position\PositionWorkflow;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(PositionWorkflow $workflow): void
    {
        try {
            DB::beginTransaction();

            if ($workflow->trashed()) {
                $workflow->forceDelete();
            } else {
                $workflow->delete();
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
