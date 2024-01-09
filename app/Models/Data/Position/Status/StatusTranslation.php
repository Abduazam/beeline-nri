<?php

namespace App\Models\Data\Position\Status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status_id',
        'locale',
        'name'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
