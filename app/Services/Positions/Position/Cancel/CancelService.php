<?php

namespace App\Services\Positions\Position\Cancel;

use App\Mail\Position\PositionCancelled;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionAcceptors\PositionAcceptor;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Models\Workflow\Position\PositionWorkflowUsers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CancelService
{
    /**
     * @throws Exception
     */
    public function cancel(array $data, PositionApplication $application): void
    {
        DB::beginTransaction();

        try {
            $application->update([
                'status_id' => (Status::where('aim', 'cancelled')->first())->id,
            ]);

            $ids = auth()->user()->position_workflow->pluck('id')->toArray();

            PositionAcceptor::where('position_application_id', $application->id)->whereIn('workflow_id', $ids)->update([
                'user_id' => auth()->user()->id,
                'comment' => $data['comment'],
                'active' => 2,
            ]);

            $this->sendCancelledMail($application, $data['comment']);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function sendCancelledMail(PositionApplication $application, string $comment): void
    {

        if ($application->user_id) {
            $user = auth()->user();
            $creatorMail = $application->user->email;
            $acceptorMail = $user->name;
            $workflowName = (PositionWorkflowUsers::where('user_id', $user->id)->first())->workflow->title;

            Mail::send(new PositionCancelled($application, $creatorMail, $acceptorMail, $workflowName, $comment));
        }
    }
}
