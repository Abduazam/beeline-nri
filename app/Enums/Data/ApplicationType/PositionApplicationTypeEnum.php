<?php

namespace App\Enums\Data\ApplicationType;

enum PositionApplicationTypeEnum : string
{
    case CREATE = 'create';
    case EDIT = 'edit';
    case DELETE = 'delete';
}
