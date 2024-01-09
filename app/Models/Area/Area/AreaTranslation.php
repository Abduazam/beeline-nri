<?php

namespace App\Models\Area\Area;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'area_id',
        'locale',
        'name'
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
