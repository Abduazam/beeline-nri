<?php

namespace App\Models\BaseStations\BaseStationTransportNetworks;

use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\EquipmentType\EquipmentType;
use App\Models\Data\LineStatuses\LineStatus;
use App\Models\Data\PositionSets\PositionSet;
use App\Models\Data\VehicleTypes\VehicleType;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseStationTransportNetwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'link_to_prts',
        'responsible_user_id',
        'gfc_node',
        'correct_id',
        'vehicle_type_id',
        'position_set_id',
        'line_status_id',
        'line_number',
        'landowner',
        'equipment_type_id',
        'interface',
        'tdm_band',
        'ip_band',
        'generalization_frequency',
        'speed',
        'antenna_diameter_in_ta',
        'antenna_diameter_in_ta_2',
        'suspension_height_in_ta',
        'suspension_height_in_ta_2',
        'power',
        'azimuth_a',
        'reservation',
        'node_code',
        'item_code',
        'response_title',
        'response_kit',
        'response_latitude',
        'response_longitude',
        'antenna_diameter_in_tb',
        'antenna_diameter_in_tb_2',
        'suspension_height_in_tb',
        'suspension_height_in_tb_2',
        'azimuth_b',
        'change_date',
        'range',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function responsible(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_user_id');
    }

    public function vehicle_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function positionSet(): BelongsTo
    {
        return $this->belongsTo(PositionSet::class);
    }

    public function line_status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LineStatus::class);
    }

    public function equipment_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(EquipmentType::class);
    }
}
