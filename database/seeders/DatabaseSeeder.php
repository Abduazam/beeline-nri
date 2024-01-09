<?php

namespace Database\Seeders;

use Database\Factories\Position\PositionApplicationFactory;
use Database\Factories\Position\PositionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSection\UsersSeeder::class,
            UserSection\PermissionsSeeder::class,
            /* Table column names */
            TableColumnNames\User\UsersTableSeeder::class,
            TableColumnNames\User\RolesTableSeeder::class,
            TableColumnNames\User\PermissionsTableSeeder::class,
            TableColumnNames\User\UserBranchTableSeeder::class,
            TableColumnNames\Widget\LanguagesTableSeeder::class,
            TableColumnNames\Widget\TableColumnNamesTableSeeder::class,
            TableColumnNames\Widget\TextNamesTableSeeder::class,
            TableColumnNames\Area\BranchesTableSeeder::class,
            TableColumnNames\Area\RegionsTableSeeder::class,
            TableColumnNames\Area\AreasTableSeeder::class,
            TableColumnNames\Data\PurposeTableSeeder::class,
            TableColumnNames\Data\CoordinateTypeTableSeeder::class,
            TableColumnNames\Data\Place\PlaceTypeTableSeeder::class,
            TableColumnNames\Data\Place\PlaceTypeGroupTableSeeder::class,
            TableColumnNames\Position\ApplicationTypeTableSeeder::class,
            TableColumnNames\Position\CompanyTableSeeder::class,
            TableColumnNames\Position\StateTableSeeder::class,
            TableColumnNames\Position\StatusTableSeeder::class,
            TableColumnNames\Workflow\PositionWorkflowTableSeeder::class,
            TableColumnNames\Workflow\BaseStationWorkflowTableSeeder::class,
            TableColumnNames\Workflow\PositionWorkflowUsersTableSeeder::class,
            TableColumnNames\Workflow\BaseStationWorkflowUsersTableSeeder::class,
            TableColumnNames\Position\Positions\PositionTableSeeder::class,
            TableColumnNames\Position\Positions\PositionApplicationTableSeeder::class,
            TableColumnNames\Position\Positions\PositionAcceptorTableSeeder::class,
            TableColumnNames\Data\ControllerTableSeeder::class,
            TableColumnNames\Data\TechnologyTableSeeder::class,
            TableColumnNames\Data\DiapasonTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationApplicationTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationAcceptorTableSeeder::class,
            TableColumnNames\Data\RoomTypeTableSeeder::class,
            TableColumnNames\Data\HardwareRoomTableSeeder::class,
            TableColumnNames\Data\HardwareOwnerTableSeeder::class,
            TableColumnNames\Data\LocationAntennaTableSeeder::class,
            TableColumnNames\Data\OpticalCableTableSeeder::class,
            TableColumnNames\Data\GeneralContractorTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationDiapasonInfoTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationDiapasonTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationStructureTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationARSTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationPowerSupplyTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationCabinetTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationENodeBTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationControlModuleTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationRadioModuleTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationSectorTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationAntennaEquipmentTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationPowerModuleTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationAntennaControlUnitTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationTransportNetworkTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationOfmPoTableSeeder::class,
            TableColumnNames\BaseStations\ProjectOfmPoTableSeeder::class,
            TableColumnNames\BaseStations\BaseStationProjectOplTableSeeder::class,
            /* App texts */
            Data\Languages\DefaultLanguageSeeder::class,
            Data\Texts\AppTextsSeeder::class,
            Data\Area\DefaultAllSeeder::class,
            Data\Place\DefaultPlacesSeeder::class,
            Data\Coordinate\DefaultCoordinateTypeSeeder::class,
            Data\Position\DefaultApplicationTypeSeeder::class,
            Data\Purpose\DefaultPurposeSeeder::class,
            Data\Position\DefaultCompanySeeder::class,
            Data\Position\DefaultStateSeeder::class,
            Data\Position\DefaultStatusSeeder::class,
            Data\Technologies\DefaultTechnologySeeder::class,
            Data\Controllers\DefaultControllersSeeder::class,
            Data\RoomType\DefaultRoomTypeSeeder::class,
            Data\HardwareRoom\DefaultHardwareRoomSeeder::class,
            Data\HardwareOwner\DefaultHardwareOwnerSeeder::class,
            Data\LocationAntenna\DefaultLocationAntennaSeeder::class,
            Data\GeneralContractor\DefaultGeneralContractorSeeder::class,
            Data\OpticalCable\DefaultOpticalCableSeeder::class,
            Data\AntennaReception\DefaultAntennaReceptionSeeder::class,
            Data\AntennaTransmission\DefaultAntennaTransmissionSeeder::class,
            Data\ElectricitySpecification\DefaultElectricitySpecificationSeeder::class,
            Data\FinancialCategoryPosition\DefaultFinancialCategoryPositionSeeder::class,
            Data\PlacementSpecification\DefaultPlacementSpecificationSeeder::class,
            Data\PowerCategory\DefaultPowerCategorySeeder::class,
            Data\RentalAgreement\DefaultRentalAgreementSeeder::class,
            Data\BtsTypes\DefaultBtsTypeSeeder::class,
            Data\MuTypes\DefaultMuTypeSeeder::class,
            Data\RruTypes\DefaultRruTypeSeeder::class,
            Data\AntennaType\DefaultAntennaTypeSeeder::class,
            Data\Feeder\DefaultFeederSeeder::class,
            Data\ICables\DefaultICableSeeder::class,
            Data\OCables\DefaultOCableSeeder::class,
            Data\EquipmentType\DefaultEquipmentTypeSeeder::class,
            UserSection\PositionCreatorSeeder::class,
            // Data\Workflow\PositionWorkflowSeeder::class,
            // Data\Workflow\BaseStationWorkflowSeeder::class,
        ]);

        // PositionApplicationFactory::times(5)->create();
    }
}
