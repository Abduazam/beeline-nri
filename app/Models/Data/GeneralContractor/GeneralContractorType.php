<?php

namespace App\Models\Data\GeneralContractor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralContractorType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title'
    ];

    public function general_contractors(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GeneralContractor::class);
    }
}
