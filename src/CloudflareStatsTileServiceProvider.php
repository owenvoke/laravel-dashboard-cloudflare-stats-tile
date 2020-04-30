<?php

namespace OwenVoke\CloudflareStatsTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use OwenVoke\CloudflareStatsTile\Commands\FetchCloudflareStatisticsCommand;

class CloudflareStatsTileServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Livewire::component('cloudflare-stats-tile', CloudflareStatsTileComponent::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchCloudflareStatisticsCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/dashboard-cloudflare-stats-tile'),
        ], 'dashboard-cloudflare-stats-tile-views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dashboard-cloudflare-stats-tile');
    }
}
