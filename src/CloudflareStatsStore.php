<?php

namespace OwenVoke\CloudflareStatsTile;

use Spatie\Dashboard\Models\Tile;

class CloudflareStatsStore
{
    private Tile $tile;

    public static function make(): self
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('cloudflare_stats');
    }

    public function setDomainRequests(int $stats): self
    {
        $this->tile->putData('domainRequests', $stats);

        return $this;
    }

    public function domainRequests(): int
    {
        return $this->tile->getData('domainRequests') ?? 0;
    }
}
