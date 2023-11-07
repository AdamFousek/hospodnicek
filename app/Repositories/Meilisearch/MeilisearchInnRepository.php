<?php

declare(strict_types=1);


namespace App\Repositories\Meilisearch;

use App\Models\Inn\Inn;
use App\Queries\Inn\InnSearch;
use App\Repositories\InnRepositoryInterface;
use App\Repositories\Meilisearch\Results\InnResults;
use Meilisearch\Client;

class MeilisearchInnRepository implements InnRepositoryInterface
{
    private const INDEX = 'inns';

    public function __construct(
        private readonly Client $client,
    ) {
    }

    public function search(InnSearch $query): InnResults
    {
        $index = $this->client->getIndex(self::INDEX);

        $search = $index->search($query->query, [
            'limit' => $query->limit,
            'offset' => ($query->page - 1) * $query->limit,
        ]);

        $innIds = [];
        foreach ($search->getHits() as $hit) {
            $innIds[] = $hit['id'];
        }

        $inns = Inn::with(['address', 'todayHours'])->whereIn('id', $innIds)->get();

        return new InnResults(
            items: $inns,
            total: $search->getHitsCount(),
            estimatedTotal: $search->getEstimatedTotalHits(),
        );
    }
}
