<?php

namespace App\Services\Workflow\Position\Users;

use App\Models\User\User;
use App\Models\Workflow\Position\PositionWorkflow;
use App\Models\Workflow\Position\PositionWorkflowUsers;
use Illuminate\Support\Facades\DB;
use Throwable;

class AddService
{
    /**
     * @throws Throwable
     */
    public function create(array $data, PositionWorkflow $workflow): void
    {
        try {
            DB::beginTransaction();

            $users = User::query()->whereIn('id', $data['data'])->get();

            foreach ($users as $user) {
                PositionWorkflowUsers::create([
                    'position_workflow_id' => $workflow->id,
                    'user_id' => $user->id,
                ]);
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
