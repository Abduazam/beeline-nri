<?php

namespace App\Models\BaseStations\BaseStationStructures;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'type_id',
        'structure_owner_id',
        'structure_owner_id',
        'height',
        'structure_location_id',
        'height_afu',
        'height_rrl',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }
}
