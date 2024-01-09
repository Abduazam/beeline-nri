<?php

namespace App\Imports\Dashboard\BaseStations\BaseStation;

use App\Imports\Dashboard\BaseStations\BaseStation\Antenna\AntennaImport;
use App\Imports\Dashboard\BaseStations\BaseStation\AntennaUnits\AntennaUnitImport;
use App\Imports\Dashboard\BaseStations\BaseStation\Cabinets\CabinetImport;
use App\Imports\Dashboard\BaseStations\BaseStation\Modules\ModuleControllerImport;
use App\Imports\Dashboard\BaseStations\BaseStation\Modules\RadioModuleImport;
use App\Imports\Dashboard\BaseStations\BaseStation\PowerModule\PowerModuleImport;
use App\Imports\Dashboard\BaseStations\BaseStation\PowerSupply\PowerSupplyImport;
use App\Imports\Dashboard\BaseStations\BaseStation\Sectors\SectorImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use App\Imports\Dashboard\BaseStations\BaseStation\Positions\PositionImport;

class BaseStation implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'Проекты' => new PositionImport(),
            'Источники питания БС и УЗО' => new PowerSupplyImport(),
            'Шкафы' => new CabinetImport(),
            'Модули управления расп. БС (MU)' => new ModuleControllerImport(),
            'Радиомодули расп. БС (RRU)' => new RadioModuleImport(),
            'Сектора' => new SectorImport(),
            'Антенны' => new AntennaImport(),
            'Модули управления (MCU)' => new PowerModuleImport(),
            'Блоки RET (RCU)' => new AntennaUnitImport(),
        ];
    }
}
