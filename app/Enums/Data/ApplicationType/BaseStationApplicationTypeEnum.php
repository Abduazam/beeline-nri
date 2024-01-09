<?php

namespace App\Enums\Data\ApplicationType;

enum BaseStationApplicationTypeEnum : string
{
    case CONSTRUCTION = 'construction';
    case POSITION_CONSTRUCTION = 'position-construction';
    case POSITION_MODERNIZATION = 'position-modernization';
    case MODERNIZATION = 'modernization';
    case OPTIMIZATION = 'optimization';
    case DISMANTLING = 'dismantling';
    case FEMTO_CONSTRUCTION = 'femto-construction';
    case CONSTRUCTION_MODERNIZATION = 'construction-modernization';
    case EMERGENCY_RECOVERY = 'emergency-recovery';
}
