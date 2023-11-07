<?php

declare(strict_types=1);


namespace App\Repositories\Illuminate;

use App\Models\Inn\Inn;
use App\Repositories\IlluminateInnRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class InnRepository implements IlluminateInnRepositoryInterface
{

    public function getByUserId(int $userId, int $pagination): LengthAwarePaginator
    {
        return Inn::with(['address'])->where('user_id', $userId)->paginate($pagination);
    }
}
