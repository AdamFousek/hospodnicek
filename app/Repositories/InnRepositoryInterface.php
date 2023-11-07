<?php

declare(strict_types=1);


namespace App\Repositories;


use App\Queries\Inn\InnSearch;
use App\Repositories\Meilisearch\Results\InnResults;

interface InnRepositoryInterface
{
    /**
     * @param InnSearch $query
     * @return InnResults
     */
    public function search(InnSearch $query): InnResults;
}
