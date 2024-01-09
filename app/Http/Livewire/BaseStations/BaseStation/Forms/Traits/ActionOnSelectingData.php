<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

use App\Enums\Data\ApplicationType\ApplicationTypeForEnum;
use App\Models\Data\AntennaReception\AntennaReception;
use App\Models\Data\AntennaTransmission\AntennaTransmission;
use App\Models\Data\AntennaType\AntennaType;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\BatteryTypes\BatteryType;
use App\Models\Data\DuplexFilter\DuplexFilter;
use App\Models\Data\ElectricitySpecification\ElectricitySpecification;
use App\Models\Data\Feeder\Feeder;
use App\Models\Data\FinancialCategoryPosition\FinancialCategoryPosition;
use App\Models\Data\HardwareOwner\HardwareOwner;
use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Models\Data\InfrastructureOwner\InfrastructureOwner;
use App\Models\Data\IpManufacturers\IpManufacturer;
use App\Models\Data\IpTypes\IpType;
use App\Models\Data\KA\KA;
use App\Models\Data\LeadOperator\LeadOperator;
use App\Models\Data\LineStatuses\LineStatus;
use App\Models\Data\LocationAntenna\LocationAntenna;
use App\Models\Data\OpticalCable\OpticalCable;
use App\Models\Data\PlacementRequired\PlacementRequired;
use App\Models\Data\PlacementSpecification\PlacementSpecification;
use App\Models\Data\PositionSets\PositionSet;
use App\Models\Data\PowerCategory\PowerCategory;
use App\Models\Data\RentalAgreement\RentalAgreement;
use App\Models\Data\RnsNeed\RnsNeed;
use App\Models\Data\RnsResult\RnsResult;
use App\Models\Data\RoomType\RoomType;
use App\Models\Data\RrlResponsePart\RrlResponsePart;
use App\Models\Data\StrengthPossibility\StrengthPossibility;
use App\Models\Data\Technology\Technology;
use App\Models\Data\VehicleCable\VehicleCable;
use App\Models\Data\VehicleTypes\VehicleType;
use App\Models\Data\WindFarmSpecification\WindFarmSpecification;
use Illuminate\Database\Eloquent\Collection;

trait ActionOnSelectingData
{
    protected function generateYears(): array
    {
        $currentYear = date('Y',strtotime('+1 year'));
        return range($currentYear, $currentYear - 22);
    }

    protected function getApplicationTypes()
    {
        $for = ApplicationTypeForEnum::BASE_STATION->value;
        return ApplicationType::select(['id', 'aim'])->with('translations')->where('for', $for)->get();
    }

    public function getDiapasons(): Collection|array
    {
        return Technology::with('diapasons')->get();
    }

    public function getRoomTypes(): Collection
    {
        return RoomType::all();
    }

    public function getHardwareRooms(): Collection
    {
        return HardwareRoom::all();
    }

    public function getHardwareOwners(): Collection
    {
        return HardwareOwner::all();
    }

    public function getLocationAntennas(): Collection
    {
        return LocationAntenna::all();
    }

    public function getKas(): Collection
    {
        return KA::all();
    }

    public function getLeadOperators(): Collection
    {
        return LeadOperator::all();
    }

    public function getInfrastructureOwners(): Collection
    {
        return InfrastructureOwner::all();
    }

    public function getRrlResponseParts(): Collection
    {
        return RrlResponsePart::all();
    }

    public function getRnsNeeds(): Collection
    {
        return RnsNeed::all();
    }

    public function getRnsResults(): Collection
    {
        return RnsResult::all();
    }

    public function getStrengthPossibilities(): Collection
    {
        return StrengthPossibility::all();
    }

    public function getRentalAgreements(): Collection
    {
        return RentalAgreement::all();
    }

    public function getElectricitySpecifications(): Collection
    {
        return ElectricitySpecification::all();
    }

    public function getPlacementSpecifications(): Collection
    {
        return PlacementSpecification::all();
    }

    public function getPlacementRequireds(): Collection
    {
        return PlacementRequired::all();
    }

    public function getFinancialCategoryPositions(): Collection
    {
        return FinancialCategoryPosition::all();
    }

    public function getPowerCategories(): Collection
    {
        return PowerCategory::all();
    }

    public function getWindFarmSpecifications(): Collection
    {
        return WindFarmSpecification::all();
    }

    public function getVehicleCables(): Collection
    {
        return VehicleCable::all();
    }

    public function getIpTypes(): Collection
    {
        return IpType::all();
    }

    public function getIpManufacturers(): Collection
    {
        return IpManufacturer::all();
    }

    public function getBatteryTypes(): Collection
    {
        return BatteryType::all();
    }

    public function getOpticalCables(): Collection
    {
        return OpticalCable::all();
    }

    public function getDuplexFilters(): Collection
    {
        return DuplexFilter::all();
    }

    public function getAntennaReception(): Collection
    {
        return AntennaReception::all();
    }

    public function getAntennaTransmissions(): Collection
    {
        return AntennaTransmission::all();
    }

    public function getFeeders(): Collection
    {
        return Feeder::all();
    }

    public function getVehicleTypes(): Collection
    {
        return VehicleType::all();
    }

    public function getPositionSets(): Collection
    {
        return PositionSet::all();
    }

    public function getLineStatuses(): Collection
    {
        return LineStatus::all();
    }
}
