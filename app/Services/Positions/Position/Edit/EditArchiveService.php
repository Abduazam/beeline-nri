<?php

namespace App\Services\Positions\Position\Edit;

use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\Position;
use App\Models\Positions\Position\PositionEdits;
use App\Models\Positions\PositionApplications\PositionApplication;
use Exception;
use Illuminate\Support\Facades\DB;

class EditArchiveService
{
    /**
     * @throws Exception
     */
    public function archive(Position $position, array $data): void
    {
        DB::beginTransaction();
        try {
            $application_type = ApplicationType::where('aim', 'edit')->first();
            $application = PositionApplication::where('position_id', $position->id)->where('application_type_id', $application_type->id)->first();

            if ($application) {
                $application->update([
                    'comment' => $data['comment'],
                ]);
            } else {
                PositionApplication::create([
                    'position_id' => $position->id,
                    'application_type_id' => $application_type->id,
                    'user_id' => auth()->user()->id,
                    'comment' => $data['comment'],
                    'status_id' => (Status::where('aim', 'preparing')->first())->id,
                ]);
            }

            $position_edit = PositionEdits::where('position_id', $position->id)->first();
            if ($position_edit) {
                $position_edit->update([
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
                ]);
            } else {
                PositionEdits::create([
                    'position_id' => $position->id,
                    'source' => $position->source,
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
                    'state_id' => $position->state_id,
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
