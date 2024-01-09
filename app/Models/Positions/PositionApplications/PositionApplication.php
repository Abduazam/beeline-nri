<?php

namespace App\Models\Positions\PositionApplications;

use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionAcceptors\PositionAcceptor;
use App\Models\Positions\PositionApplications\Traits\ApplicationTypeCheckingTrait;
use App\Models\Positions\PositionApplications\Traits\StatusCheckingTrait;
use App\Models\User\User;
use App\Models\Widget\TextName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionApplication extends Model
{
    use HasFactory, SoftDeletes;
    use StatusCheckingTrait, ApplicationTypeCheckingTrait;

    protected $fillable = [
        'position_id',
        'application_type_id',
        'user_id',
        'comment',
        'status_id',
        'active'
    ];

    public function acceptors(): HasMany
    {
        return $this->hasMany(PositionAcceptor::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class)->withTrashed();
    }

    public function application_type(): BelongsTo
    {
        return $this->belongsTo(ApplicationType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function acceptorActive(): string
    {
        $user_workflows = auth()->user()->position_workflow->pluck('id')->toArray();

        $application = $this->acceptors->filter(function ($acceptor) use ($user_workflows) {
            return in_array($acceptor->workflow_id, $user_workflows);
        });

        return match ($application->first()->active) {
            1 => "<span class='badge bg-success'>" . TextName::getTextTranslation('accepted') . "</span>",
            2 => "<span class='badge bg-pulse'>" . TextName::getTextTranslation('cancelled') . "</span>",
            default => "<span class='badge bg-gray-dark'>" . TextName::getTextTranslation('not-responded') . "</span>",
        };
    }

    public function getStatus(): string
    {
        $status = $this->status->aim;

        return match ($status) {
            'preparing' => "<span class='text-warning'>" . $this->status->translations[0]->name . "</span>",
            'registered' => "<span class='text-dark'>" . $this->status->translations[0]->name . "</span>",
            'in-work' => "<span class='text-info'>" . $this->status->translations[0]->name . "</span>",
            'executed' => "<span class='text-success'>" . $this->status->translations[0]->name . "</span>",
            'cancelled' => "<span class='text-danger'>" . $this->status->translations[0]->name . "</span>",
            default => "<span class='text-gray-dark'>" . TextName::getTextTranslation('not-responded') . "</span>",
        };
    }

    public function isResponded(): bool
    {
        $user_workflows = auth()->user()->position_workflow->pluck('id')->toArray();

        $application = $this->acceptors->filter(function ($acceptor) use ($user_workflows) {
            return in_array($acceptor->workflow_id, $user_workflows) and $acceptor->active !== 0;
        });

        if (count($application) > 0) {
            return false;
        }

        return true;
    }
}
