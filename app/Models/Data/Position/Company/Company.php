<?php

namespace App\Models\Data\Position\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    public function translations(): HasMany
    {
        return $this->hasMany(CompanyTranslation::class)->where('locale', app()->getLocale());
    }
}
