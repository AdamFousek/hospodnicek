<?php

declare(strict_types=1);


namespace App\Repositories\Meilisearch;

use App\Models\Inn\Inn;
use App\Queries\Enums\InnSort;
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

        $filter = [];

        if (isset($query->lat, $query->lng) && (int)$query->distance > 0) {
            $filter['filter'] = "_geoRadius({$query->lat}, {$query->lng}, {$query->distance})";
        }

        $sort = $this->resolveSort($query);
        if ($sort !== '') {
            $filter['sort'][] = $sort;
        }

        $filter['limit'] = $query->limit;
        $filter['offset'] = ($query->page - 1) * $query->limit;

        $search = $index->search($query->query, $filter);

        $innIds = [];
        foreach ($search->getHits() as $hit) {
            $innIds[] = $hit['id'];
        }

        $inns = Inn::with(['address', 'todayHours'])->whereIn('id', $innIds)->get();

        $sortedInns = $inns->sortBy(fn(Inn $inn) => array_search($inn->id, $innIds));

        return new InnResults(
            items: $sortedInns,
            total: $search->getHitsCount(),
            estimatedTotal: $search->getEstimatedTotalHits(),
        );
    }

    private function resolveSort(InnSearch $query): string
    {
        return match ($query->sort) {
            InnSort::DEFAULT => '',
            InnSort::NAME => 'name:asc',
            InnSort::DISTANCE => "_geoPoint({$query->lat},{$query->lng}):asc",
            InnSort::RATING => throw new \Exception('To be implemented'),

        };
    }
}
