<?php

namespace App\Services\Positions\Position\Delete;

use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionApplications\PositionApplication;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteArchiveService
{
    /**
     * @throws Exception
     */
    public function archive(Position $position, string $comment): void
    {
        DB::beginTransaction();
        try {
            $application_type = ApplicationType::where('aim', 'delete')->first();
            $application = PositionApplication::where('position_id', $position->id)->where('application_type_id', $application_type->id)->first();

            if ($application) {
                $application->update([
                    'comment' => $comment,
                ]);
            } else {
                PositionApplication::create([
                    'position_id' => $position->id,
                    'application_type_id' => (ApplicationType::where('aim', 'delete')->first())->id,
                    'user_id' => auth()->user()->id,
                    'comment' => $comment,
                    'status_id' => (Status::where('aim', 'preparing')->first())->id,
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
