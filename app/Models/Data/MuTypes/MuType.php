<?php

namespace App\Models\Data\MuTypes;

use App\Models\BaseStations\BaseStationControlModules\BaseStationControlModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MuType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'model',
        'manufacturer',
        'diapasons',
    ];

    public function control_module()
    {
        return $this->belongsTo(BaseStationControlModule::class, 'mu_type_id');
    }
}
