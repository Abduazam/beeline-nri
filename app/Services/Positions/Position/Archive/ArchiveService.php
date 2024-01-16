<?php

namespace App\Services\Positions\Position\Archive;

use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Position\State\State;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionApplications\PositionApplication;
use Exception;
use Illuminate\Support\Facades\DB;

class ArchiveService
{
    /**
     * @throws Exception
     */
    public function archive(array $data, ?PositionApplication $application = null): PositionApplication
    {
        DB::beginTransaction();
        try {
            if (!is_null($application)) {
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

                $application->update([
                    'comment' => $data['application']['comment']
                ]);
            } else {
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
                    'status_id' => (Status::where('aim', 'preparing')->first())->id,
                ]);
            }

            DB::commit();

            return $application;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
