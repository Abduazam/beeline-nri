<?php

namespace App\Models\Data\RruTypes;

use App\Models\BaseStations\BaseStationRadioModules\BaseStationRadioModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RruType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'model',
        'manufacturer',
        'max_number_transceivers',
        'diapasons',
    ];

    public function radio_module()
    {
        return $this->belongsTo(BaseStationRadioModule::class, 'rru_type_id');
    }
}
