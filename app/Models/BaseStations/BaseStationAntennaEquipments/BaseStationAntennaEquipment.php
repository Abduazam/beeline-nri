<?php

namespace App\Models\BaseStations\BaseStationAntennaEquipments;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\AntennaReception\AntennaReception;
use App\Models\Data\AntennaTransmission\AntennaTransmission;
use App\Models\Data\AntennaType\AntennaType;
use App\Models\Data\Feeder\Feeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationAntennaEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'sectors',
        'sector_number',
        'antenna_type_id',
        'meta_article',
        'top_antenna',
        'azimuth',
        'suspension_height',
        'diapasons',
        'direction_diagram',
        'direction_diagram_2',
        'ku_antennas',
        'bisector',
        'electrical_tilt',
        'mechanical_tilt',
        'sum_tilts',
        'antenna_reception_id',
        'antenna_transmission_id',
        'feeder_id',
        'feeder_length',
        'latitude',
        'longitude',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function antenna_reception(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AntennaReception::class);
    }

    public function antenna_transmission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AntennaTransmission::class);
    }

    public function feeder(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Feeder::class);
    }

    public function antenna_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AntennaType::class);
    }
}
