<?php

namespace App\Services\Workflow\BaseStation\Users;

use App\Models\Workflow\BaseStation\BaseStationWorkflowUsers;
use Illuminate\Support\Facades\DB;
use Throwable;

class RemoveService
{
    /**
     * @throws Throwable
     */
    public function delete(BaseStationWorkflowUsers $user): void
    {
        try {
            DB::beginTransaction();

            if ($user->trashed()) {
                $user->forceDelete();
            } else {
                $user->delete();
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
