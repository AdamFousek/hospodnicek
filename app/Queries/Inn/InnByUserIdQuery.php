<?php

declare(strict_types=1);


namespace App\Queries\Inn;

use App\Repositories\IlluminateInnRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
class InnByUserIdQuery
{
    public function __construct(
       private readonly IlluminateInnRepositoryInterface $repository,
    ) {
    }

    public function handle(InnByUserId $query): LengthAwarePaginator
    {
        return $this->repository->getByUserId($query->userId, $query->pagination);
    }
}
