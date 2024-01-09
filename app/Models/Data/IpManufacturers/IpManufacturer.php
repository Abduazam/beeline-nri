<?php

namespace App\Models\Data\IpManufacturers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IpManufacturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title'
    ];
}
