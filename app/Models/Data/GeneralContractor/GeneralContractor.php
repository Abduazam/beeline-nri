<?php

namespace App\Models\Data\GeneralContractor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralContractor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'general_contractor_type_id',
        'inn',
        'title',
        'address'
    ];

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GeneralContractorType::class, 'general_contactors_type_id');
    }
}
