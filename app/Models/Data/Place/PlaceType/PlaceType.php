<?php

namespace App\Models\Data\Place\PlaceType;

use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaceType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    public function translations(): HasMany
    {
        return $this->hasMany(PlaceTypeTranslation::class)->where('locale', app()->getLocale());
    }

    public function groups(): HasMany
    {
        return $this->hasMany(PlaceTypeGroup::class);
    }
}
