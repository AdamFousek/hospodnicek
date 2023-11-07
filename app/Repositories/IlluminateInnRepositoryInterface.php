<?php

declare(strict_types=1);


namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface IlluminateInnRepositoryInterface
{

    public function getByUserId(int $userId, int $pagination): LengthAwarePaginator;
}
