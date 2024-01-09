<?php

namespace App\Models\BaseStations\BaseStationControlModules;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationCabinets\BaseStationCabinet;
use App\Models\Data\MuTypes\MuType;
use App\Models\Data\RoomType\RoomType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseStationControlModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'mu_type_id',
        'mu_number',
        'room_type_id',
        'cabinet_id',
        'bs_name_nms',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function muType(): BelongsTo
    {
        return $this->belongsTo(MuType::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function cabinet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationCabinet::class, 'cabinet_id');
    }
}
