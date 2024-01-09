<?php

namespace App\Services\Workflow\Position\Users;

use App\Models\Workflow\Position\PositionWorkflowUsers;
use Illuminate\Support\Facades\DB;
use Throwable;

class RemoveService
{
    /**
     * @throws Throwable
     */
    public function delete(PositionWorkflowUsers $user): void
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
