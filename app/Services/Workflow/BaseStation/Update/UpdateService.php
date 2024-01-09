<?php

namespace App\Services\Workflow\BaseStation\Update;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, BaseStationWorkflow $workflow): void
    {
        try {
            DB::beginTransaction();

            $workflow->update(['title' => $data['workflow']['title']]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
