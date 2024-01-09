<?php

namespace App\Models\Data\Position\State;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'state_id',
        'locale',
        'name'
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
