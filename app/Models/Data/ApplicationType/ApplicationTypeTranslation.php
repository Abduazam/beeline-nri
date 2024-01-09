<?php

namespace App\Models\Data\ApplicationType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationTypeTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_type_id',
        'locale',
        'name'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ApplicationType::class, 'application_type_id');
    }
}
