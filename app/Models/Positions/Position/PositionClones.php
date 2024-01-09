<?php

namespace App\Models\Positions\Position;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PositionClones extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
        'source',
        'company_id',
        'place_type_id',
        'place_type_group_id',
        'purpose_id',
        'region_id',
        'area_id',
        'name',
        'territory_id',
        'address',
        'coordinate_id',
        'latitude',
        'longitude',
        'state_id',
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class)->withTrashed();
    }
}
