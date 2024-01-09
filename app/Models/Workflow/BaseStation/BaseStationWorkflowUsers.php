<?php

namespace App\Models\Workflow\BaseStation;

use App\Models\User\User;
use App\Traits\Model\StatusTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseStationWorkflowUsers extends Model
{
    use HasFactory, StatusTrait, SoftDeletes;

    protected $fillable = [
        'base_station_workflow_id',
        'user_id',
    ];

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(BaseStationWorkflow::class, 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
