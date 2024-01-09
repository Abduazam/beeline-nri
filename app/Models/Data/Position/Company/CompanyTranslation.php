<?php

namespace App\Models\Data\Position\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'locale',
        'name'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
