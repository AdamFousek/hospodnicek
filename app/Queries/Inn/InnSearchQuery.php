<?php

declare(strict_types=1);


namespace App\Queries\Inn;

use App\Repositories\InnRepositoryInterface;
use App\Repositories\Meilisearch\Results\InnResults;

class InnSearchQuery
{
    public function __construct(
        private readonly InnRepositoryInterface $repository,
    ) {
    }

    public function handle(InnSearch $query): InnResults
    {
        return $this->repository->search($query);
    }
}
