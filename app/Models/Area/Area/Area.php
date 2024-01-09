<?php

namespace App\Models\Area\Area;

use App\Models\Area\Region\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Area extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'region_id',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(AreaTranslation::class)->where('locale', App::getLocale());
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
