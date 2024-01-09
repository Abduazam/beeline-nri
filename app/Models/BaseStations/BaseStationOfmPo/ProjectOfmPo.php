<?php

namespace App\Models\BaseStations\BaseStationOfmPo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectOfmPo extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_target',
        'project_type',
        'range_selection',
        'project_documents',
    ];
}
