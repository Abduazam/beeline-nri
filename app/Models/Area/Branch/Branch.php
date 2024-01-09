<?php

namespace App\Models\Area\Branch;

use App\Models\Area\Region\Region;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    public function translations(): HasMany
    {
        return $this->hasMany(BranchTranslation::class)->where('locale', App::getLocale());
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_branches');
    }

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }
}
