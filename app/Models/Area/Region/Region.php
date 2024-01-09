<?php

namespace App\Models\Area\Region;

use App\Models\Area\Branch\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Region extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'branch_id',
        'code',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(RegionTranslation::class)->where('locale', App::getLocale());
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
