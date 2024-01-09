<?php

namespace App\Models\Data\Diapason;

use App\Models\Data\Technology\Technology;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diapason extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'technology_id',
        'band',
    ];

    public function technology(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }
}
