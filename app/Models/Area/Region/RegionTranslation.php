<?php

namespace App\Models\Area\Region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'region_id',
        'locale',
        'name'
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
