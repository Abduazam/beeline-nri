<?php

namespace App\Models\Data\Controllers;

use App\Models\Area\Region\Region;
use App\Models\Data\Position\State\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Controller extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'region_id',
        'number',
        'name',
        'gfk',
        'number_position',
        'position',
        'address',
        'state_id',
    ];

    public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
