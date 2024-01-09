<?php

namespace App\Models\BaseStations\BaseStationProjectOpl;

use App\Models\BaseStations\BaseStation\BaseStation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationProjectOpl extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_id',
        'source',
        'diapasons',
        'number',
        'created_date',
        'status',
        'description',
    ];

    public function base_station(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStation::class);
    }
}
