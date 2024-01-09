<?php

namespace App\Models\BaseStations\BaseStationPowerModules;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationPowerModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'mcu_type',
        'mcu_number',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }
}
