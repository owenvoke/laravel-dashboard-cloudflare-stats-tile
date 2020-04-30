<x-dashboard-tile
    :position="$position"
    :refresh-interval="$refreshIntervalInSeconds"
>
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div
            class="flex items-center justify-center"
            style="background-color: rgba(255, 255, 255, .9)"
        >
            <h1 class="text-3xl leading-none -mt-1">Cloudflare Statistics</h1>
        </div>

        <ul class="self-center divide-y-2">
            @foreach($domainStatistics as $domainId => $statistics)
                <li class="py-1 truncate">
                    <h3 class="text-md uppercase">{{ $domainId }}</h3>
                    <ul class="self-center space-y-1 text-sm pl-2">
                        <li> {{ $statistics['requests'] }} <span class="text-dimmed">requests today</span></li>
                        <li> {{ $statistics['bytes'] }} <span class="text-dimmed">bytes today</span></li>
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</x-dashboard-tile>
