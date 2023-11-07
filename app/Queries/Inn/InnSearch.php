<?php

declare(strict_types=1);


namespace App\Queries\Inn;

use App\Queries\Enums\InnSort;

class InnSearch
{
    public const LIMIT = 21;

    public function __construct(
        public readonly string $query,
        public readonly InnSort $sort = InnSort::DEFAULT,
        public readonly ?float $lat = null,
        public readonly ?float $lng = null,
        public readonly int $page = 1,
        public readonly int $limit = self::LIMIT,
    ) {
    }
}
