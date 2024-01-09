<?php

namespace App\Models\BaseStations\BaseStationSectors;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\BaseStations\BaseStationENodeB\BaseStationENodeB;
use App\Models\BaseStations\BaseStationRadioModules\BaseStationRadioModule;
use App\Models\Data\Diapason\Diapason;
use App\Models\Data\DuplexFilter\DuplexFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseStationSector extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'rssh',
        'sector_number',
        'cell_id',
        'diapason_id',
        'title',
        'e_node_b_id',
        'transceivers',
        'drate_transceivers',
        'bts_number',
        'rru_id',
        'antenna_number',
        'azimuth',
        'metro',
        'lna_availability',
        'lna_type',
        'lna_number',
        'duplex_filter_id',
        'duplex_filter_number',
    ];

    public function baseStationApplication(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function diapason(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Diapason::class);
    }

    public function e_node_b(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationENodeB::class, 'e_node_b_id');
    }

    public function radio_module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationRadioModule::class, 'rru_id');
    }

    public function duplex_filter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DuplexFilter::class);
    }
}
