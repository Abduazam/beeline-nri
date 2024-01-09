<?php

namespace App\Services\Positions\Position\Accept;

use App\Mail\Position\PositionAccepted;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\PositionClones;
use App\Models\Positions\PositionAcceptors\PositionAcceptor;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Models\Workflow\Position\PositionWorkflowUsers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AcceptService
{
    /**
     * @throws Exception
     */
    public function accept(array $data, PositionApplication $application): void
    {
        DB::beginTransaction();

        try {
            $application->update([
                'status_id' => (Status::where('aim', 'in-work')->first())->id,
            ]);

            $ids = auth()->user()->position_workflow->pluck('id')->toArray();
            PositionAcceptor::where('position_application_id', $application->id)->whereIn('workflow_id', $ids)->update([
                'user_id' => auth()->user()->id,
                'comment' => $data['comment'],
                'active' => 1,
            ]);

            $otherAcceptors = PositionAcceptor::query()
                ->where('position_application_id', $application->id)
                ->where('active', 0)->get();
            if (!count($otherAcceptors) > 0) {
                $isAllAccepted = PositionAcceptor::query()
                    ->where('position_application_id', $application->id)->get();

                $allStatusesEqualAccepted = $isAllAccepted->every(function ($record) {
                    return $record->active === 1;
                });

                if ($allStatusesEqualAccepted) {
                    $application->update([
                        'status_id' => (Status::where('aim', 'executed')->first())->id,
                    ]);

                    if ($application->isDeleting()) {
                        $application->position->delete();
                    }

                    if ($application->isEditing()) {
                        $positionData = $application->position->only([
                            'source',
                            'company_id',
                            'place_type_id',
                            'place_type_group_id',
                            'purpose_id',
                            'region_id',
                            'area_id',
                            'name',
                            'territory_id',
                            'address',
                            'coordinate_id',
                            'latitude',
                            'longitude',
                            'state_id',
                        ]);

                        PositionClones::create(array_merge(['position_id' => $application->position->id], $positionData));

                        $application->position->update($application->position->edits->only(array_keys($positionData)));
                    }
                }
            }

            $this->sendAcceptedMail($application, $data['comment']);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function sendAcceptedMail(PositionApplication $application, string $comment): void
    {
        if ($application->user_id) {
            $user = auth()->user();
            $creatorMail = $application->user->email;
            $acceptorMail = $user->name;
            $workflowName = (PositionWorkflowUsers::query()->where('user_id', $user->id)->first())->workflow->title;

            Mail::send(new PositionAccepted($application, $creatorMail, $acceptorMail, $workflowName, $comment));
        }
    }
}
