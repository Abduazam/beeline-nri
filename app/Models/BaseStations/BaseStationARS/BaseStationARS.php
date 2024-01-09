<?php

namespace App\Models\BaseStations\BaseStationARS;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\ElectricitySpecification\ElectricitySpecification;
use App\Models\Data\FinancialCategoryPosition\FinancialCategoryPosition;
use App\Models\Data\InfrastructureOwner\InfrastructureOwner;
use App\Models\Data\LeadOperator\LeadOperator;
use App\Models\Data\PlacementRequired\PlacementRequired;
use App\Models\Data\PlacementSpecification\PlacementSpecification;
use App\Models\Data\PowerCategory\PowerCategory;
use App\Models\Data\RentalAgreement\RentalAgreement;
use App\Models\Data\RnsNeed\RnsNeed;
use App\Models\Data\RnsResult\RnsResult;
use App\Models\Data\RrlResponsePart\RrlResponsePart;
use App\Models\Data\StrengthPossibility\StrengthPossibility;
use App\Models\Data\VehicleCable\VehicleCable;
use App\Models\Data\WindFarmSpecification\WindFarmSpecification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseStationARS extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'lead_operator_id',
        'infrastructure_owner_id',
        'second_operator_number',
        'contractor_for_reinforcement',
        'rrl_response_part_id',
        'rns_need_id',
        'rns_result_id',
        'strength_possibility_id',
        'rental_agreement_id',
        'electricity_specification_id',
        'placement_specification_id',
        'placement_required_id',
        'financial_category_position_id',
        'power_category_id',
        'wind_farm_specification_id',
        'energy_department_comment',
        'power_backup',
        'lighting_lights',
        'vehicle_cable_id',
        'number',
        'additional_information',
        'cabinets_number',
    ];

    public function baseStationApplication(): BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function leadOperator(): BelongsTo
    {
        return $this->belongsTo(LeadOperator::class);
    }

    public function infrastructureOwner(): BelongsTo
    {
        return $this->belongsTo(InfrastructureOwner::class);
    }

    public function rrlResponsePart(): BelongsTo
    {
        return $this->belongsTo(RrlResponsePart::class);
    }

    public function rnsNeed(): BelongsTo
    {
        return $this->belongsTo(RnsNeed::class);
    }

    public function rnsResult(): BelongsTo
    {
        return $this->belongsTo(RnsResult::class);
    }

    public function strengthPossibility(): BelongsTo
    {
        return $this->belongsTo(StrengthPossibility::class);
    }

    public function rentalAgreement(): BelongsTo
    {
        return $this->belongsTo(RentalAgreement::class);
    }

    public function electricitySpecification(): BelongsTo
    {
        return $this->belongsTo(ElectricitySpecification::class);
    }

    public function placementSpecification(): BelongsTo
    {
        return $this->belongsTo(PlacementSpecification::class);
    }

    public function placementRequired(): BelongsTo
    {
        return $this->belongsTo(PlacementRequired::class);
    }

    public function financialCategoryPosition(): BelongsTo
    {
        return $this->belongsTo(FinancialCategoryPosition::class);
    }

    public function powerCategory(): BelongsTo
    {
        return $this->belongsTo(PowerCategory::class);
    }

    public function windFarmSpecification(): BelongsTo
    {
        return $this->belongsTo(WindFarmSpecification::class);
    }

    public function vehicleCable(): BelongsTo
    {
        return $this->belongsTo(VehicleCable::class);
    }
}
