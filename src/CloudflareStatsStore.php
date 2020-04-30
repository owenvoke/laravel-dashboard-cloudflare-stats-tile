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

    public function setDomainStatistics(array $stats): self
    {
        $this->tile->putData('domainStatistics', $stats);

        return $this;
    }

    public function domainStatistics(): array
    {
        return $this->tile->getData('domainStatistics') ?? [];
    }
}
