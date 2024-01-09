<?php

namespace App\Models\BaseStations\BaseStationDiapasons;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Models\Data\HardwareOwner\HardwareOwner;
use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Models\Data\KA\KA;
use App\Models\Data\LocationAntenna\LocationAntenna;
use App\Models\Data\RoomType\RoomType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationDiapasonInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'room_type_id',
        'hardware_room_id',
        'hardware_owner_id',
        'location_antenna_id',
        'height_afu',
        'general_contractor_id',
        'type_ka',
        'k_a_id'
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function room_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function hardware_room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HardwareRoom::class);
    }

    public function hardware_owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HardwareOwner::class, 'hardware_owner_id');
    }

    public function location_antenna(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LocationAntenna::class);
    }

    public function general_contractor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GeneralContractor::class);
    }

    public function ka(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(KA::class, 'ka_id');
    }
}
