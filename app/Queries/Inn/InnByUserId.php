<?php

declare(strict_types=1);


namespace App\Queries\Inn;

class InnByUserId
{
    public function __construct(
        public readonly int $userId,
        public readonly int $pagination = 15,
    ) {
    }
}
