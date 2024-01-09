<?php

namespace App\Models\Data\Place\PlaceType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaceTypeTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'place_type_id',
        'locale',
        'name'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(PlaceType::class);
    }
}
