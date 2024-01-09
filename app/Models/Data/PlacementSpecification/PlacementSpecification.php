<?php

namespace App\Models\Data\PlacementSpecification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlacementSpecification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
    ];
}
