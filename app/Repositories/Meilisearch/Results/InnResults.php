<?php

declare(strict_types=1);


namespace App\Repositories\Meilisearch\Results;


use Illuminate\Support\Collection;

class InnResults
{
    public function __construct(
        public readonly Collection $items,
        public readonly int $total,
        public readonly int $estimatedTotal,
    ) {
    }
}
