<?php

namespace App\Services\Workflow\Position\Users;

use App\Models\Workflow\Position\PositionWorkflowUsers;
use Illuminate\Support\Facades\DB;
use Throwable;

class RestoreService
{
    /**
     * @throws Throwable
     */
    public function restore(PositionWorkflowUsers $user): void
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
