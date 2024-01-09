<?php

namespace App\Services\BaseStations\BaseStation\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\BaseStation\BaseStationCreated;
use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use App\Models\BaseStations\BaseStationAcceptors\BaseStationAcceptor;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;

class CreateService
{
    protected array $mails;

    /**
     * @throws Exception
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $bs = BaseStation::create([
                'year' => $data['year'],
                'position_id' => $data['position_id']
            ]);

            /**
             * Base Station application
             */
            $application = (new \App\Services\BaseStations\BaseStationApplication\CreateService())->create($bs->id, $data['application_type_id']);

            /**
             * Base Station diapasons
             */
            (new \App\Services\BaseStations\BaseStationDiapasons\CreateService())->create($application->id, $data['data']['diapasons']['chosen_diapasons']);

            /**
             * Base Station diapason info
             */
            (new \App\Services\BaseStations\BaseStationDiapasonInfo\CreateService())->create($application->id, $data['data']['diapasons']['diapason_info']);

            /**
             * Base Station structure
             */
            (new \App\Services\BaseStations\BaseStationStructure\CreateService())->create($application->id, $data['data']['structures']);

            /**
             * Base Station ars
             */
            (new \App\Services\BaseStations\BaseStationARS\CreateService())->create($application->id, $data['data']['ars']);

            /**
             * Base Station power supplies
             */
            (new \App\Services\BaseStations\BaseStationPowerSupply\CreateService())->create($application->id, $data['data']['power_supplies']);

            /**
             * Base Station cabinets
             */
            $cabinetIds = (new \App\Services\BaseStations\BaseStationCabinets\CreateService())->create($application->id, $data['data']['cabinets']);

            /**
             * Base Station e_nodes
             */
            $eNodes = (new \App\Services\BaseStations\BaseStationENode\CreateService())->create($application->id, $data['data']['e_nodes']);

            /**
             * Base Station control_modules
             */
            $controlModuleIds = (new \App\Services\BaseStations\BaseStationControlModules\CreateService())->create($application->id, $cabinetIds, $data['data']['control_modules']);

            /**
             * Base Station radio_modules
             */
            $radioModuleIds = (new \App\Services\BaseStations\BaseStationRadioModules\CreateService())->create($application->id, $controlModuleIds, $data['data']['radio_modules']);

            /**
             * Base Station sectors
             */
            (new \App\Services\BaseStations\BaseStationSectors\CreateService())->create($application->id, $data['data']['sectors'], $radioModuleIds, $cabinetIds, $eNodes);

            /**
             * Base Station antenna equipments
             */
            (new \App\Services\BaseStations\BaseStationAntenna\CreateService())->create($application->id, $data['data']['antennas']);

            /**
             * Base Station transport network
             */
            (new \App\Services\BaseStations\BaseStationTransport\CreateService())->create($application->id, $data['data']['transports']);

            $this->sendCreatedMail($application);
        });
    }

    private function sendCreatedMail(BaseStationApplication $application): void
    {
        $this->isResendPosition($application);

        if (count($this->mails)) {
            Mail::send(new BaseStationCreated($application, $this->mails));
        }
    }

    private function isResendPosition(BaseStationApplication $application): void
    {
        $acceptPosition = BaseStationAcceptor::query()
            ->where('base_station_application_id', $application->id)->get();
        if (count($acceptPosition) > 0) {
            BaseStationAcceptor::where('base_station_application_id', $application->id)->update([
                'user_id' => null,
                'comment' => null,
                'active' => 0,
            ]);
        } else {
            $workflows = BaseStationWorkflow::query()->with('users.user')->orderBy('id')->get();
            if (count($workflows) > 0) {
                foreach ($workflows as $workflow) {
                    BaseStationAcceptor::create([
                        'base_station_application_id' => $application->id,
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
