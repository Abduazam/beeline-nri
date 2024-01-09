<?php

namespace App\Models\Data\ApplicationType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'aim',
        'for',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(ApplicationTypeTranslation::class)->where('locale', app()->getLocale());
    }
}
