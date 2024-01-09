<?php

namespace App\Models\BaseStations\BaseStationDiapasons;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\Controllers\Controller;
use App\Models\Data\Diapason\Diapason;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationDiapason extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'base_station_application_id',
        'diapason_id',
        'controller_id',
        'is_new',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function diapason(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Diapason::class, 'diapason_id');
    }

    public function controller(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Controller::class);
    }
}
