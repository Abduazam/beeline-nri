<?php

namespace App\Models\Data\LocationAntenna;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocationAntenna extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
    ];
}
