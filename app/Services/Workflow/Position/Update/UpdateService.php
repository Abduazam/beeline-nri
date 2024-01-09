<?php

namespace App\Services\Workflow\Position\Update;

use App\Models\Workflow\Position\PositionWorkflow;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, PositionWorkflow $workflow): void
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
