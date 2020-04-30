<?php

namespace OwenVoke\CloudflareStatsTile;

use Livewire\Component;

class CloudflareStatsTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position): void
    {
        $this->position = $position;
    }

    public function render()
    {
        $cloudflareStatsStore = CloudflareStatsStore::make();

        return view('dashboard-cloudflare-stats-tile::tile', [
            'domainStatistics' => $cloudflareStatsStore->domainStatistics(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.cloudflare_stats.refresh_interval_in_seconds', 60),
        ]);
    }
}
