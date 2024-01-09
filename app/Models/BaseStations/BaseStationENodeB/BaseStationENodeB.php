<?php

namespace App\Models\BaseStations\BaseStationENodeB;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\Diapason\Diapason;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationENodeB extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'e_node_b_id',
        'diapason_id',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function diapason(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Diapason::class);
    }
}
