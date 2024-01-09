<?php

namespace App\Models\Workflow\Position;

use App\Models\Positions\PositionAcceptors\PositionAcceptor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionWorkflow extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(PositionWorkflowUsers::class, 'position_workflow_id');
    }

    public function acceptors(): HasMany
    {
        return $this->hasMany(PositionAcceptor::class);
    }
}
