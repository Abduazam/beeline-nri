<?php

namespace App\Models\Data\BatteryTypes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BatteryType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title'
    ];
}
