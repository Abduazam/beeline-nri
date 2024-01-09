<?php

namespace App\Models\Workflow\BaseStation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseStationWorkflow extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(BaseStationWorkflowUsers::class, 'base_station_workflow_id');
    }

//    public function acceptors(): HasMany
//    {
//        return $this->hasMany(PositionAcceptor::class);
//    }
}
