<?php

namespace App\Models\Data\Purpose;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Purpose extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    public function translations(): HasMany
    {
        return $this->hasMany(PurposeTranslation::class)->where('locale', app()->getLocale());
    }
}
