<?php

namespace App\Models\Data\Place\PlaceTypeGroup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaceTypeGroupTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'place_type_group_id',
        'locale',
        'name'
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(PlaceTypeGroup::class);
    }
}
