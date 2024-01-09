<?php

namespace App\Models\Area\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $branch_id
 * @property string $locale
 * @property string $name
 */
class BranchTranslation extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'branch_translations';

    protected $fillable = [
        'branch_id',
        'locale',
        'name'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
