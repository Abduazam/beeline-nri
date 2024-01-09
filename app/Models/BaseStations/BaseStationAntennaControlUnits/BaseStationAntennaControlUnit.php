<?php

namespace App\Models\BaseStations\BaseStationAntennaControlUnits;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationAntennaEquipments\BaseStationAntennaEquipment;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationRadioModules\BaseStationRadioModule;
use App\Models\Data\ICables\ICable;
use App\Models\Data\Motors\Motor;
use App\Models\Data\OCables\OCable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationAntennaControlUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'rru_control',
        'antenna_id',
        'antenna_type',
        'sectors',
        'number_mcu_rru',
        'type_mcu_rru',
        'motor_id',
        'i_cable_id',
        'o_cable_id',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function antenna(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationAntennaEquipment::class, 'antenna_id');
    }

    public function motor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Motor::class);
    }

    public function i_cable(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ICable::class);
    }

    public function o_cable(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OCable::class);
    }
}
