<?php

namespace App\Models\BaseStations\BaseStation;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Positions\Position\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseStation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'year',
        'position_id',
        'transfer_distribution',
        'search_latitude',
        'search_longitude',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(BaseStationApplication::class, 'base_station_id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
