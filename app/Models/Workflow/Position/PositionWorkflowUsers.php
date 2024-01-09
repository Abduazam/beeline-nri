<?php

namespace App\Models\Workflow\Position;

use App\Models\User\User;
use App\Traits\Model\StatusTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionWorkflowUsers extends Model
{
    use HasFactory, StatusTrait, SoftDeletes;

    protected $fillable = [
        'position_workflow_id',
        'user_id',
    ];

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(PositionWorkflow::class, 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
