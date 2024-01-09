<?php

namespace App\Models\Positions\PositionAcceptors;

use App\Models\Positions\PositionApplications\PositionApplication;
use App\Models\User\User;
use App\Models\Widget\TextName;
use App\Models\Workflow\Position\PositionWorkflow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PositionAcceptor extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_application_id',
        'workflow_id',
        'user_id',
        'comment',
        'active'
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(PositionApplication::class);
    }

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(PositionWorkflow::class);
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
            default => '',
        };
    }
}
