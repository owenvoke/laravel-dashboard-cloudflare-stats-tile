<?php

namespace OwenVoke\CloudflareStatsTile\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Cloudflare
{
    public const GRAPHQL_URL = 'https://api.cloudflare.com/client/v4/graphql';

    public static function getTotalDomainRequests(string $authKey, string $authEmail, array $domainIds): int
    {
        $query = <<<'GRAPHQL'
        query GetCloudflareStats($domainIds: array, $today: Date) {
          viewer {
            zones(filter: {zoneTag_in: $domainIds}) {
              httpRequests1dGroups(limit: 1, filter: {date: $today}) {
                sum {
                  requests
                }
              }
            }
          }
        }
        GRAPHQL;

        $response = Http::withHeaders([
            'X-Auth-Key' => $authKey,
            'X-Auth-Email' => $authEmail,
        ])->post(self::GRAPHQL_URL, [
            'query' => $query,
            'variables' => [
                'domainIds' => $domainIds,
                'today' => Carbon::now()->toDateString(),
            ],
        ])->json();

        return collect($response['data']['viewer']['zones'] ?? [])
            ->sum(static function (array $item) {
                return $item['httpRequests1dGroups'][0]['sum']['requests'] ?: 0;
            });
    }
}
