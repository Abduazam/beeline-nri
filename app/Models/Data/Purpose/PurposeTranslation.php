<?php

namespace App\Models\Data\Purpose;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurposeTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'purpose_id',
        'locale',
        'name'
    ];

    public function purpose(): BelongsTo
    {
        return $this->belongsTo(Purpose::class);
    }
}
