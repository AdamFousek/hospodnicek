<?php

declare(strict_types=1);


namespace App\Services;

use App\Services\Results\GeolocationResult;
use mysql_xdevapi\Exception;

class GeolocationService
{
    private const API_URL = 'https://freegeoip.app/json/';

    public function resolveIp(string $ip): ?GeolocationResult
    {
        try {
            $curl = curl_init(self::API_URL . $ip);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            $ipDetails = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
            if ($ipDetails === null) {
                throw new Exception('Invalid response from API');
            }

            return new GeolocationResult(
                $ipDetails['country_code'] ?? '',
                $ipDetails['city'] ?? '',
                $ipDetails['zip_code'] ?? '',
                    (float)($ipDetails['latitude'] ?? 0.0),
                    (float)($ipDetails['longitude'] ?? 0.0),
            );
        } catch (\Exception $e) {
            logger()?->error($e->getMessage(), ['exception' => $e]);

            return null;
        }
    }

    public function resolveByCookie(): ?GeolocationResult
    {
        try {
            if (isset($_COOKIE['geolocation'])) {
                $cookie = $_COOKIE['geolocation'];
                $parsedCookie = json_decode($cookie, true, 512, JSON_THROW_ON_ERROR);

                return new GeolocationResult(
                    '',
                    '',
                    '',
                    $parsedCookie['lat'] ?? '',
                    $parsedCookie['lng'] ?? '',
                );
            }

            return null;
        } catch (\Exception $e) {
            logger()?->error($e->getMessage(), ['exception' => $e]);

            return null;
        }
    }
}
