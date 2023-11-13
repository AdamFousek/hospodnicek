<?php

declare(strict_types=1);


namespace App\Services\Results;

readonly class GeolocationResult
{
    public function __construct(
        public string $countryCode,
        public string $city,
        public string $zipCode,
        public float $latitude,
        public float $longitude,
    ) {
    }
}
