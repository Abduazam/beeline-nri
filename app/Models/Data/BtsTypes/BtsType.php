<?php

namespace App\Models\Data\BtsTypes;

use App\Models\BaseStations\BaseStationCabinets\BaseStationCabinet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BtsType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'model',
        'distribution',
    ];

    public function cabinet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationCabinet::class, 'bts_type_id');
    }
}
