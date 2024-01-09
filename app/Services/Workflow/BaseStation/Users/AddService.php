<?php

namespace App\Services\Workflow\BaseStation\Users;

use App\Models\User\User;
use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Models\Workflow\BaseStation\BaseStationWorkflowUsers;
use Illuminate\Support\Facades\DB;
use Throwable;

class AddService
{
    /**
     * @throws Throwable
     */
    public function create(array $data, BaseStationWorkflow $workflow): void
    {
        try {
            DB::beginTransaction();

            $users = User::query()->whereIn('id', $data['data'])->get();

            foreach ($users as $user) {
                BaseStationWorkflowUsers::create([
                    'base_station_workflow_id' => $workflow->id,
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
