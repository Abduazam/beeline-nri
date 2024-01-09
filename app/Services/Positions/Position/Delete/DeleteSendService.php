<?php

namespace App\Services\Positions\Position\Delete;

use App\Mail\Position\PositionCreated;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionAcceptors\PositionAcceptor;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Models\Workflow\Position\PositionWorkflow;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DeleteSendService
{
    protected array $mails;

    /**
     * @throws Exception
     */
    public function send(Position $position, string $comment): void
    {
        DB::beginTransaction();

        try {
            $application_type = ApplicationType::where('aim', 'delete')->first();
            $application = PositionApplication::where('position_id', $position->id)->where('application_type_id', $application_type->id)->first();

            $application->update([
                'comment' => $comment,
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
