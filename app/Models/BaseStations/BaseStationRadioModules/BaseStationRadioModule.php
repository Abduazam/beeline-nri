<?php

namespace App\Models\BaseStations\BaseStationRadioModules;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationControlModules\BaseStationControlModule;
use App\Models\Data\OpticalCable\OpticalCable;
use App\Models\Data\RruTypes\RruType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseStationRadioModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'rru_number',
        'rru_type_id',
        'sectors',
        'control_module_id',
        'transceivers',
        'optical_cable_id',
        'optical_cable_number',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function rruType(): BelongsTo
    {
        return $this->belongsTo(RruType::class);
    }

    public function opticalCable(): BelongsTo
    {
        return $this->belongsTo(OpticalCable::class);
    }
}
