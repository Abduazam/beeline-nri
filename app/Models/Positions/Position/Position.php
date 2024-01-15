<?php

namespace App\Models\Positions\Position;

use App\Models\Area\Area\Area;
use App\Models\Area\Region\Region;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Coordinate\CoordinateType;
use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Position\Company\Company;
use App\Models\Data\Position\State\State;
use App\Models\Data\Position\Status\Status;
use App\Models\Data\Purpose\Purpose;
use App\Models\Positions\PositionApplications\PositionApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number',
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

    public static bool $skipBoot = false;

    /**
     * Generates number for application
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        if (!self::$skipBoot) {
            static::creating(function ($position) {
                $latestPosition = self::latest('number')->first();

                if ($latestPosition) {
                    $position->number = $latestPosition->number + 1;
                } else {
                    $position->number = 1;
                }
            });
        }
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

    public function application($application_type_aim)
    {
        $application_type = ApplicationType::where('aim', $application_type_aim)->first();
        return PositionApplication::where('application_type_id', $application_type->id)->first();
    }

    public function hasApplicationDelete(): bool
    {
        $application_type = ApplicationType::where('aim', 'delete')->first();
        $application = PositionApplication::where('position_id', $this->id)->where('application_type_id', $application_type->id)->first();
        if ($application and !$application->isPreparing()) {
            return true;
        }

        return false;
    }

    public function hasApplicationEdit(): bool
    {
        $application_type = ApplicationType::where('aim', 'edit')->first();
        $status = Status::where('aim', 'executed')->first();
        $application = PositionApplication::where('position_id', $this->id)->where('application_type_id', $application_type->id)->whereNot('status_id', $status->id)->first();
        if ($application and !$application->isPreparing()) {
            return true;
        }

        return false;
    }

    public function edits(): HasOne
    {
        return $this->hasOne(PositionEdits::class);
    }

    public function clones(): HasMany
    {
        return $this->hasMany(PositionClones::class);
    }
}
