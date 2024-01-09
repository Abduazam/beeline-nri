<?php

namespace App\Models\BaseStations\BaseStationApplications;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationAcceptors\BaseStationAcceptor;
use App\Models\BaseStations\BaseStationAntennaControlUnits\BaseStationAntennaControlUnit;
use App\Models\BaseStations\BaseStationAntennaEquipments\BaseStationAntennaEquipment;
use App\Models\BaseStations\BaseStationARS\BaseStationARS;
use App\Models\BaseStations\BaseStationCabinets\BaseStationCabinet;
use App\Models\BaseStations\BaseStationControlModules\BaseStationControlModule;
use App\Models\BaseStations\BaseStationDiapasons\BaseStationDiapason;
use App\Models\BaseStations\BaseStationDiapasons\BaseStationDiapasonInfo;
use App\Models\BaseStations\BaseStationENodeB\BaseStationENodeB;
use App\Models\BaseStations\BaseStationPowerModules\BaseStationPowerModule;
use App\Models\BaseStations\BaseStationPowerSupplies\BaseStationPowerSupply;
use App\Models\BaseStations\BaseStationRadioModules\BaseStationRadioModule;
use App\Models\BaseStations\BaseStationSectors\BaseStationSector;
use App\Models\BaseStations\BaseStationTransportNetworks\BaseStationTransportNetwork;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Position\Status\Status;
use App\Models\Positions\PositionApplications\Traits\ApplicationTypeCheckingTrait;
use App\Models\Positions\PositionApplications\Traits\StatusCheckingTrait;
use App\Models\User\User;
use App\Models\Widget\TextName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseStationApplication extends Model
{
    use HasFactory, SoftDeletes;
    use StatusCheckingTrait, ApplicationTypeCheckingTrait;

    protected $fillable = [
        'id',
        'base_station_id',
        'application_type_id',
        'user_id',
        'comment',
        'status_id',
        'active'
    ];

    public function baseStation(): BelongsTo
    {
        return $this->belongsTo(BaseStation::class, 'base_station_id')->withTrashed();
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
        $user_workflows = auth()->user()->base_station_workflow->pluck('id')->toArray();

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
        $user_workflows = auth()->user()->base_station_workflow->pluck('id')->toArray();

        $application = $this->acceptors->filter(function ($acceptor) use ($user_workflows) {
            return in_array($acceptor->workflow_id, $user_workflows) and $acceptor->active !== 0;
        });

        if (count($application) > 0) {
            return false;
        }

        return true;
    }

    public function baseStationAcceptors(): HasMany
    {
        return $this->hasMany(BaseStationAcceptor::class, 'base_station_application_id');
    }

    public function diapasons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BaseStationDiapason::class, 'base_station_application_id');
    }

    public function baseStationDiapasonInfo(): HasOne
    {
        return $this->hasOne(BaseStationDiapasonInfo::class, 'base_station_application_id');
    }

    public function baseStationARS(): HasOne
    {
        return $this->hasOne(BaseStationARS::class, 'base_station_application_id');
    }

    public function baseStationPowerSupplies(): HasMany
    {
        return $this->hasMany(BaseStationPowerSupply::class, 'base_station_application_id');
    }

    public function baseStationCabinets(): HasMany
    {
        return $this->hasMany(BaseStationCabinet::class, 'base_station_application_id');
    }

    public function baseStationENodes(): HasMany
    {
        return $this->hasMany(BaseStationENodeB::class, 'base_station_application_id');
    }

    public function baseStationControlModules(): HasMany
    {
        return $this->hasMany(BaseStationControlModule::class, 'base_station_application_id');
    }

    public function baseStationRadioModules(): HasMany
    {
        return $this->hasMany(BaseStationRadioModule::class, 'base_station_application_id');
    }

    public function baseStationSectors(): HasMany
    {
        return $this->hasMany(BaseStationSector::class, 'base_station_application_id');
    }

    public function baseStationAntennas(): HasMany
    {
        return $this->hasMany(BaseStationAntennaEquipment::class, 'base_station_application_id');
    }

    public function baseStationPowerModules(): HasMany
    {
        return $this->hasMany(BaseStationPowerModule::class, 'base_station_application_id');
    }

    public function baseStationAntennaUnits(): HasMany
    {
        return $this->hasMany(BaseStationAntennaControlUnit::class, 'base_station_application_id');
    }

    public function baseStationTransportNetworks(): HasMany
    {
        return $this->hasMany(BaseStationTransportNetwork::class, 'base_station_application_id');
    }

    public function getDiapasonNumbers(): string
    {
        return $this->diapasons()->pluck('number')->unique()->implode(', ');
    }

    public function getTechnologyNames(): string
    {
        return $this->diapasons->pluck('diapason.technology.name')->unique()->implode(', ');
    }
}
