<?php

namespace App\Enums;

enum ProjectStatusEnum:string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in progress';
    case BLOCKED = 'blocked';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';
}