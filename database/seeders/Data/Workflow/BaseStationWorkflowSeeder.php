<?php

namespace Database\Seeders\Data\Workflow;

use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Models\Workflow\BaseStation\BaseStationWorkflowUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseStationWorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workflows = [
            "BS Workflow 1" => [
                'user_id' => 4,
            ],
            "BS Workflow 2" => [
                'user_id' => 3,
            ],
        ];

        foreach ($workflows as $key => $users) {
            $pw = BaseStationWorkflow::create(['title' => $key]);
            $mergedArray = array_merge(['base_station_workflow_id' => $pw->id], $users);
            BaseStationWorkflowUsers::create($mergedArray);
        }
    }
}
