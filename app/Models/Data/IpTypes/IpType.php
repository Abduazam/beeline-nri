<?php

namespace App\Models\Data\IpTypes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IpType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title'
    ];
}
