<?php

namespace App\Models\Data\OpticalCable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpticalCable extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
    ];
}
