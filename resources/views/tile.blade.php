<x-dashboard-tile :position="$position">
    <div wire:poll.600s class="uppercase">
        <div class="flex w-full justify-center space-x-4 items-center">
            <span> {{ $totalDomainRequests }} <span class="text-sm uppercase text-dimmed">Cloudflare requests today</span> </span>
        </div>
    </div>
</x-dashboard-tile>
