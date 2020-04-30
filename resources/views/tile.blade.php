<x-dashboard-tile :position="$position">
    <div class="flex w-full justify-center space-x-4 items-center">
        <div class="grid grid-rows-auto-1 gap-2 h-full">
            <h1 class="uppercase font-bold">Cloudflare Statistics</h1>
            <ul class="self-center">

                @foreach($domainStatistics as $domainId => $statistics)
                    <li
                        class="py-1 truncate"
                        style="border-color: rgba(0, 0, 0, 0.1);"
                    >
                        <h3 class="text-md uppercase">{{ $domainId }}</h3>
                        <ul class="self-center space-y-1 text-sm pl-2">
                            <li> {{ $statistics['requests'] }} <span class="text-dimmed">requests today</span></li>
                            <li> {{ $statistics['bytes'] }} <span class="text-dimmed">bytes today</span></li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-dashboard-tile>
