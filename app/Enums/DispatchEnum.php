<?php

namespace App\Enums;

enum DispatchEnum : string
{
    case CREATE = 'far fa-circle-check text-success';
    case EDIT = 'fa fa-circle-info text-warning';
    case DELETE = 'fa fa-circle-exclamation text-danger';
    case RESTORE = 'fa fa-arrow-rotate-left text-primary';
}
