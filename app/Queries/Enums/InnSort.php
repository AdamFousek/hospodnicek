<?php

declare(strict_types=1);


namespace App\Queries\Enums;

enum InnSort: int
{
    case DEFAULT = 0;
    case NAME = 1;
    case DISTANCE = 2;
    case RATING = 3;
}
