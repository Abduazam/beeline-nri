<?php

namespace App\Models\BaseStations\BaseStationPowerSupplies;

use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;
use App\Models\Data\BatteryTypes\BatteryType;
use App\Models\Data\IpManufacturers\IpManufacturer;
use App\Models\Data\IpTypes\IpType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseStationPowerSupply extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_station_application_id',
        'd',
        'purpose',
        'ip_type_id',
        'ip_manufacturer_id',
        'battery_type_id',
        'power',
        'voltage',
    ];

    public function base_station_application(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BaseStationApplication::class);
    }

    public function ipType(): BelongsTo
    {
        return $this->belongsTo(IpType::class);
    }

    public function ipManufacturer(): BelongsTo
    {
        return $this->belongsTo(IpManufacturer::class);
    }

    public function batteryType(): BelongsTo
    {
        return $this->belongsTo(BatteryType::class);
    }
}
