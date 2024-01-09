<?php

namespace App\Models\Positions\Position;

use App\Models\Area\Area\Area;
use App\Models\Area\Region\Region;
use App\Models\Data\Coordinate\CoordinateType;
use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Position\Company\Company;
use App\Models\Data\Position\State\State;
use App\Models\Data\Purpose\Purpose;
use App\Models\Positions\PositionApplications\PositionApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PositionEdits extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
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
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class)->withTrashed();
    }

    public function applications(): HasMany
    {
        return $this->hasMany(PositionApplication::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function place_type(): BelongsTo
    {
        return $this->belongsTo(PlaceType::class);
    }

    public function place_type_group(): BelongsTo
    {
        return $this->belongsTo(PlaceTypeGroup::class);
    }

    public function purpose(): BelongsTo
    {
        return $this->belongsTo(Purpose::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function territory(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function coordinate(): BelongsTo
    {
        return $this->belongsTo(CoordinateType::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
