<?php

namespace App\Services\Positions\Position\Send;

use App\Mail\Position\PositionCreated;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionAcceptors\PositionAcceptor;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Models\Workflow\Position\PositionWorkflow;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendService
{
    protected array $mails;

    /**
     * @throws Exception
     */
    public function send(array $data, PositionApplication $application): void
    {
        DB::beginTransaction();

        try {
            $updateData = [
                'status_id' => (Status::where('aim', 'registered')->first())->id,
            ];

            if (!empty($data)) {
                $updateData['comment'] = $data['application']['comment'];
            }

            $application->update($updateData);

            if (!empty($data)) {
                $application->position->update([
                    'company_id' => $data['application']['position']['company_id'],
                    'place_type_id' => $data['application']['position']['place_type_id'],
                    'place_type_group_id' => $data['application']['position']['place_type_group_id'],
                    'purpose_id' => $data['application']['position']['purpose_id'],
                    'region_id' => $data['application']['position']['region_id'],
                    'area_id' => $data['application']['position']['area_id'],
                    'name' => $data['application']['position']['name'],
                    'territory_id' => $data['application']['position']['territory_id'],
                    'address' => $data['application']['position']['address'],
                    'coordinate_id' => $data['application']['position']['coordinate_id'],
                    'latitude' => $data['coordinate_values']['latitude']['decimal'],
                    'longitude' => $data['coordinate_values']['longitude']['decimal'],
                ]);
            }

            $this->sendCreatedMail($application);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function sendCreatedMail(PositionApplication $application): void
    {
        $this->isResendPosition($application);

        if (count($this->mails)) {
            Mail::send(new PositionCreated($application, $this->mails));
        }
    }

    private function isResendPosition(PositionApplication $application): void
    {
        $store = true;

        $acceptPosition = PositionAcceptor::query()
            ->where('position_application_id', $application->id)->get();
        if (count($acceptPosition) > 0) {
            PositionAcceptor::where('position_application_id', $application->id)->update([
                'user_id' => null,
                'comment' => null,
                'active' => 0,
            ]);

            $store = false;
        }

        $workflows = PositionWorkflow::query()->with('users.user')->orderBy('id')->get();
        if (count($workflows) > 0) {
            foreach ($workflows as $workflow) {
                if ($store) {
                    PositionAcceptor::create([
                        'position_application_id' => $application->id,
                        'workflow_id' => $workflow->id,
                    ]);
                }

                $creator_branches = auth()->user()->branches->pluck('id')->toArray();

                $filteredUsers = $workflow->users->filter(function ($user) use ($creator_branches) {
                    $userBranchIds = $user->user->branches->pluck('id')->toArray();

                    return count(array_intersect($userBranchIds, $creator_branches)) > 0;
                });

                $this->mails = $filteredUsers->pluck('user.email')->toArray();
            }
        }
    }
}
