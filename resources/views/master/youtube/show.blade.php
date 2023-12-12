<x-app-layout>
    <div class="space-y-2 pl-10 pr-5">
        <div class="flex gap-4">
            <div class="w-2/3 flex-none">
                <div class="h-[379px]">
                    <iframe class="w-full h-full rounded-lg" src="{{ $youtube->link }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div>
                    <p class="text-xl text-white font-extrabold my-2">{{ $youtube->judul }}</p>
                    <div class="w-full bg-gray-800 rounded-lg p-3 text-white">
                        {{ $youtube->deskripsi }}
                    </div>
                </div>
            </div>
            <div>
                <ul class="space-y-2">
                    @foreach ($youtubeAll as $item)
                        @if ($item->id !== $youtube->id)
                            <li>
                                <a href="{{ route('youtube.show', $item->id) }}">
                                    <div class="flex gap-2">
                                        <div class="flex-none">
                                            <iframe class="w-[168px] h-[94px] rounded-lg" src="{{ $item->link }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div>
                                            <p class="text-white text-sm line-clamp-2 mt-2">{{ $item->judul }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
