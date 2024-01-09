<?php

namespace App\Services\Positions\Position\Create;

use App\Mail\Position\PositionCreated;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Position\State\State;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionAcceptors\PositionAcceptor;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Models\Workflow\Position\PositionWorkflow;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CreateService
{
    protected array $mails;

    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        DB::beginTransaction();

        try {
            $position = Position::create([
                'source' => $data['source'],
                'company_id' => $data['company_id'],
                'place_type_id' => $data['place_type_id'],
                'place_type_group_id' => $data['place_type_group_id'],
                'purpose_id' => $data['purpose_id'],
                'region_id' => $data['region_id'],
                'area_id' => $data['area_id'],
                'name' => $data['name'],
                'territory_id' => $data['territory_id'],
                'address' => $data['address'],
                'coordinate_id' => $data['coordinate_id'],
                'latitude' => $data['coordinate_values']['latitude']['decimal'],
                'longitude' => $data['coordinate_values']['longitude']['decimal'],
                'state_id' => (State::where('aim', 'sketch')->first())->id,
            ]);

            $application = PositionApplication::create([
                'position_id' => $position->id,
                'application_type_id' => (ApplicationType::where('aim', 'create')->first())->id,
                'user_id' => auth()->user()->id,
                'comment' => $data['comment'],
                'status_id' => (Status::where('aim', 'registered')->first())->id,
            ]);

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
        $acceptPosition = PositionAcceptor::query()
            ->where('position_application_id', $application->id)->get();
        if (count($acceptPosition) > 0) {
            PositionAcceptor::where('position_application_id', $application->id)->update([
                'user_id' => null,
                'comment' => null,
                'active' => 0,
            ]);
        } else {
            $workflows = PositionWorkflow::query()->with('users.user')->orderBy('id')->get();
            if (count($workflows) > 0) {
                foreach ($workflows as $workflow) {
                    PositionAcceptor::create([
                        'position_application_id' => $application->id,
                        'workflow_id' => $workflow->id,
                    ]);

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
}
