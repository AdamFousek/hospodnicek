<?php

namespace App\Http\Controllers;

use App\Queries\Enums\InnSort;
use App\Queries\Inn\InnSearch;
use App\Queries\Inn\InnSearchQuery;
use App\Services\GeolocationService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomepageController extends Controller
{
    private const LIMIT = 10;

    public function __construct(
        private readonly GeolocationService $geolocationService,
        private readonly InnSearchQuery $innSearchQuery,
    ) {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        if (!isset($_COOKIE['geolocation'])) {
            $ip = $request->getClientIp();
            $geoLocation = $this->geolocationService->resolveIp($ip);
        } else {
            $geoLocation = $this->geolocationService->resolveByCookie();
        }

        $sort = $geoLocation !== null ? InnSort::DISTANCE : InnSort::DEFAULT;

        $innResult = $this->innSearchQuery->handle(
            new InnSearch(
                query: '',
                sort: $sort,
                lat: $geoLocation?->latitude,
                lng: $geoLocation?->longitude,
                distance: 0,
                limit: self::LIMIT,
            )
        );

        return Inertia::render('Homepage', [
            'inns' => $innResult->items,
            'sort' => $sort,
        ]);
    }
}
