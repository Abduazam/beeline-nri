<?php

namespace App\Models\BaseStations\BaseStationOfmPo;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\Data\Diapason\Diapason;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationOfmPo extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_id',
        'bs_number',
        'diapason_id',
        'po_number',
        'ofm_number',
        'po_project',
        'ofm_project',
        'status_ofm_project',
    ];

    public function base_station(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStation::class);
    }

    public function diapason(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Diapason::class);
    }
}
