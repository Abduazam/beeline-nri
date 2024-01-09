<?php

namespace App\Models\Data\HardwareRoom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HardwareRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
    ];
}
