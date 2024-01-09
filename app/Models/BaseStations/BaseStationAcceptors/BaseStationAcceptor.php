<?php

namespace App\Models\BaseStations\BaseStationAcceptors;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\User\User;
use App\Models\Widget\TextName;
use App\Models\Workflow\BaseStation\BaseStationWorkflow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseStationAcceptor extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'workflow_id',
        'user_id',
        'comment',
        'active'
    ];

    public function baseStationApplication(): BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(BaseStationWorkflow::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getActive(): string
    {
        return match ($this->active) {
            1 => "<badge class='badge bg-success'>" . TextName::getTextTranslation('accepted') . "</badge>",
            2 => "<badge class='badge bg-pulse'>" . TextName::getTextTranslation('cancelled') . "</badge>",
            default => "<badge class='badge bg-secondary'>не активен</badge>",
        };
    }
}
