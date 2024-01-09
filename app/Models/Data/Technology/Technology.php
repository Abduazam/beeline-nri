<?php

namespace App\Models\Data\Technology;

use App\Models\Data\Diapason\Diapason;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
    ];

    public function diapasons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Diapason::class);
    }
}
