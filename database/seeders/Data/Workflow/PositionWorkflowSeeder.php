<?php

namespace Database\Seeders\Data\Workflow;

use App\Models\Workflow\Position\PositionWorkflow;
use App\Models\Workflow\Position\PositionWorkflowUsers;
use Illuminate\Database\Seeder;

class PositionWorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workflows = [
            "Планировка" => [
                'user_id' => 3,
            ],
            "Техничиский" => [
                'user_id' => 4,
            ],
        ];

        foreach ($workflows as $key => $users) {
            $pw = PositionWorkflow::create(['title' => $key]);
            $mergedArray = array_merge(['position_workflow_id' => $pw->id], $users);
            PositionWorkflowUsers::create($mergedArray);
        }
    }
}
