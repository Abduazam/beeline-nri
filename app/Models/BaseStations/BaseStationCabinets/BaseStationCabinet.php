<?php

namespace App\Models\BaseStations\BaseStationCabinets;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\BtsTypes\BtsType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseStationCabinet extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'bts_type_id',
        'bts_number',
        'bs_name_nms',
        'transceivers_number',
        'e1_threads_number',
        'mb',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function btsType(): BelongsTo
    {
        return $this->belongsTo(BtsType::class);
    }
}
