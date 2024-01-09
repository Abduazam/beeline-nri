<?php

namespace App\Models\Data\AntennaType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AntennaType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'model',
        'diapasons',
        'horizontal_diagram',
        'vertical_diagram',
        'ku_antenna',
        'electrical_tilt',
        'mechanical_tilt',
    ];
}
