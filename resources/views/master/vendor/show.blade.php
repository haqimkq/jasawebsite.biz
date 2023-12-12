<x-app-layout>
    <div class="pl-10 pr-3 py-2 space-y-2">
        <p class="text-white text-2xl">Daftar Domain</p>
        <p class="text-white">
            @foreach ($vendorDomain as $item)
                @if ($item->id == $id)
                    ({{ $item->vendor }})
                @endif
            @endforeach
        </p>
        @foreach ($vendorDomain as $item)
            @if ($item->id == $id)
                @foreach ($item->domain as $items)
                    <div class="w-full border border-gray-300 p-3 rounded-lg bg-gray-700 hover:bg-gray-600 text-white">
                        {{ $loop->index + 1 }}. {{ $items }}
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>
</x-app-layout>
