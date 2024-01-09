<?php

namespace App\Models\Data\Place\PlaceTypeGroup;

use App\Models\Data\Place\PlaceType\PlaceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaceTypeGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'place_type_id',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(PlaceTypeGroupTranslation::class)->where('locale', app()->getLocale());
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(PlaceType::class, 'place_type_id');
    }
}
