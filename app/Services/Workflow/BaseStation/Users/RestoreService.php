<?php

namespace App\Services\Workflow\BaseStation\Users;

use App\Models\Workflow\BaseStation\BaseStationWorkflowUsers;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(BaseStationWorkflowUsers $user): void
    {
        try {
            DB::beginTransaction();

            $user->restore();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
