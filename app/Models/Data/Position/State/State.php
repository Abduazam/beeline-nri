<?php

namespace App\Models\Data\Position\State;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'aim',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(StateTranslation::class)->where('locale', app()->getLocale());
    }
}
