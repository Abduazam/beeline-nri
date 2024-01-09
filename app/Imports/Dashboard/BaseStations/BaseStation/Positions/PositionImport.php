<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation\Positions;

use App\Helpers\Helper;
use App\Models\BaseStations\BaseStationARS\BaseStationARS;
use App\Models\BaseStations\BaseStationDiapasons\BaseStationDiapason;
use App\Models\BaseStations\BaseStationDiapasons\BaseStationDiapasonInfo;
use App\Models\Data\Controllers\Controller;
use App\Models\Data\Diapason\Diapason;
use App\Models\Data\ElectricitySpecification\ElectricitySpecification;
use App\Models\Data\FinancialCategoryPosition\FinancialCategoryPosition;
use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Models\Data\LocationAntenna\LocationAntenna;
use App\Models\Data\PlacementSpecification\PlacementSpecification;
use App\Models\Data\PowerCategory\PowerCategory;
use App\Models\Data\RentalAgreement\RentalAgreement;
use App\Models\Data\RoomType\RoomType;
use App\Models\Data\Technology\Technology;
use App\Models\Data\VehicleCable\VehicleCable;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Data\Position\Status\Status;
use App\Models\Area\Region\RegionTranslation;
use App\Models\Data\Coordinate\CoordinateType;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Services\Imports\Users\GenerateUserMailService;
use App\Services\Imports\Users\UserFindOrCreateService;
use App\Services\Imports\Positions\PositionImportService;
use App\Services\Imports\BaseStations\BaseStationImportService;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Services\Imports\ApplicationTypes\BaseStationApplicationTypeService;

class PositionImport implements ToModel, WithHeadingRow
{
    private int $rowCount = 0;

    public function model(array $row): ?BaseStationARS
    {
        if (!empty($row['id_proekta']) && !is_null($row['id_proekta'])) {
            $this->rowCount++;

            $tech_bands = Helper::getBandAndTechnology($row['god_v_prs'], $row['telekom_standart'], $row['bs']);

            $bs_application = BaseStationApplication::where('id', $row['id_proekta'])->first();
            if ($bs_application) {
                return null;
            }

            $branch_name = explode(" - ", $row['filial']);
            $region_name = mb_substr($branch_name[1], 0, 5, 'UTF-8');
            $region = RegionTranslation::where('name', 'like', "%$region_name%")->first();
            $coordinate = CoordinateType::first();
            $latitude = explode(" ", $row["sirota"])[0];
            $longitude = explode(" ", $row['dolgota'])[0];
            $application_type = ApplicationType::where('aim', 'create')->first();
            $status = Status::where('aim', 'registered')->first();

            $position = (new PositionImportService($row['nomer_pozicii'], $region->region_id, $row['naimenovanie'], $row['adres'], $coordinate->id, $latitude, $longitude))->create();

            $email = (new GenerateUserMailService($row['proektirovshhik']))->generate();

            $user = (new UserFindOrCreateService($email, $row['proektirovshhik']))->findOrCreate();

            PositionApplication::firstOrCreate(
                ['position_id' => $position->id],
                [
                    'position_id' => $position->id,
                    'application_type_id' => $application_type->id,
                    'user_id' => $user->id,
                    'status_id' => $status->id,
                ]
            );

            $yearExploded = explode(" ", $row['god_v_prs']);
            $year = (int)$yearExploded[0];

            $bs = (new BaseStationImportService($year, $position->id))->create();
            $bs_application_type = (new BaseStationApplicationTypeService($row['tip']))->findOrCreate();

            $bs_app = BaseStationApplication::firstOrCreate(
                ['id' => $row['id_proekta']],
                [
                    'id' => $row['id_proekta'],
                    'base_station_id' => $bs->id,
                    'application_type_id' => $bs_application_type->id,
                    'user_id' => $user->id,
                    'status_id' => $status->id,
                ]
            );

            $controller_name = $row['kontroller'];
            $controller = Controller::where('name', 'like', "%$controller_name%")->first();
            if (!$controller) {
                $controller = Controller::create([
                    'region_id' => $region->region_id,
                    'number' => $this->rowCount,
                    'name' => $controller_name,
                    'number_position' => "W",
                    'position' => "ATE-25",
                    'address' => $region->name,
                    'state_id' => 3,
                ]);
            }

            foreach ($tech_bands as $tech => $bands) {
                $technology = Technology::firstOrCreate(
                    ['name' => $tech],
                    [
                        'code' => substr($row['bs'], 0, 2),
                        'name' => $tech,
                    ]
                );

                foreach ($bands as $band) {
                    $diapason = Diapason::firstOrCreate(
                        [
                            'technology_id' => $technology->id,
                            'band' => $band
                        ],
                        [
                            'technology_id' => $technology->id,
                            'band' => $band
                        ]
                    );

                    $row_bs = $row['bs'];
                    if (str_starts_with($row['bs'], "Beenet:")) {
                        $row_bs = substr($row_bs, strlen("Beenet:"));
                    }

                    $numbers = explode(',', $row_bs);
                    foreach ($numbers as $number) {
                        BaseStationDiapason::create([
                            'number' => $number,
                            'base_station_application_id' => $bs_app->id,
                            'diapason_id' => $diapason->id,
                            'controller_id' => $controller->id,
                        ]);
                    }
                }
            }

            $room_type = RoomType::firstOrCreate(
                [
                    'title' => $row['tip_pomeshh']
                ],
                [
                    'title' => $row['tip_pomeshh']
                ]
            );

            $hardware_room = HardwareRoom::firstOrCreate(
                [
                    'title' => $row['mesto_razmeshh_apparat_i']
                ],
                [
                    'title' => $row['mesto_razmeshh_apparat_i']
                ]
            );

            $location_antenna = LocationAntenna::firstOrCreate(
                [
                    'title' => $row['mesto_razmeshh_antenny']
                ],
                [
                    'title' => $row['mesto_razmeshh_antenny']
                ]
            );

            $general_contractor = null;
            if (!empty($row['gen_podriadcik'])) {
                $general_contractor = GeneralContractor::firstOrCreate(
                    [
                        'title' => $row['gen_podriadcik']
                    ],
                    [
                        'general_contractor_type_id' => random_int(1, 3),
                        'inn' => random_int(1000, 9999),
                        'title' => $row['gen_podriadcik'],
                    ]
                );
            }


            $height_afu = floatval($row['vysota_obieekta_razmeshh_afu_m']);

            BaseStationDiapasonInfo::create([
                'base_station_application_id' => $bs_app->id,
                'room_type_id' => $room_type->id,
                'hardware_room_id' => $hardware_room->id,
                'location_antenna_id' => $location_antenna->id,
                'height_afu' => $height_afu,
                'general_contractor_id' => $general_contractor?->id,
            ]);

            $rental_agreement = RentalAgreement::firstOrCreate(
                ['title' => ucfirst($row['nalicie_dogovora_arendy'])],
                ['title' => ucfirst($row['nalicie_dogovora_arendy'])],
            );

            $electricity_specification = ElectricitySpecification::firstOrCreate(
                ['title' => ucfirst($row['nalicie_tu_na_elen'])],
                ['title' => ucfirst($row['nalicie_tu_na_elen'])]
            );

            $placement_specification = PlacementSpecification::firstOrCreate(
                ['title' => ucfirst($row['nalicie_tu_na_razmeshhenie'])],
                ['title' => ucfirst($row['nalicie_tu_na_razmeshhenie'])]
            );

            $financial_category = FinancialCategoryPosition::firstOrCreate(
                ['title' => ucfirst($row['finans_kategoriia_pozicii'])],
                ['title' => ucfirst($row['finans_kategoriia_pozicii'])]
            );

            $power_category = PowerCategory::firstOrCreate(
                ['title' => ucfirst($row['kategoriia_elektropitaniia'])],
                ['title' => ucfirst($row['kategoriia_elektropitaniia'])]
            );

            $power_backup = !empty($row['rezerv_e_pitaniia']);
            $lighting_lights = !empty($row['osvetit_ogni']);

            $vehicle_cable = null;
            if (!empty($row['voln_sopr_e'])) {
                $vehicle_cable = VehicleCable::firstOrCreate(
                    ['title' => $row['voln_sopr_e']],
                    ['title' => $row['voln_sopr_e']]
                );
            }

            return new BaseStationARS([
                'base_station_application_id' => $bs_app->id,
                'rental_agreement_id' => $rental_agreement->id,
                'electricity_specification_id' => $electricity_specification->id,
                'placement_specification_id' => $placement_specification->id,
                'financial_category_position_id' => $financial_category->id,
                'power_category_id' => $power_category->id,
                'power_backup' => $power_backup,
                'lighting_lights' => $lighting_lights,
                'vehicle_cable_id' => $vehicle_cable?->id,
                'additional_information' => $row['dop_informaciia'],
                'cabinets_number' => $row['kolicestvo_radio_skafov'],
            ]);
        }

        return null;
    }
}
