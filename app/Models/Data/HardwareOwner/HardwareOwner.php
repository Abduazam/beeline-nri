<?php

namespace App\Models\Data\HardwareOwner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HardwareOwner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
    ];
}
