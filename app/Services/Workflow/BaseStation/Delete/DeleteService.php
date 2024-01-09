<?php

namespace App\Services\Workflow\BaseStation\Delete;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteService
{
    /**
     * @throws Throwable
     */
    public function delete(BaseStationWorkflow $workflow): void
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
