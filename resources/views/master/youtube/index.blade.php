<x-app-layout>
    <div class="space-y-2 pl-10 pr-5">
        @if (Auth::user()->isAdmin == true)
            <div class="">
                <button data-modal-toggle="addYoutube" data-modal-target="addYoutube"
                    class="dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500">
                    Tambah Youtube</button>
                <x-modal.addYoutubeModal :user="$user"></x-modal.addYoutubeModal>
            </div>
        @endif
        <div class="">
            <div class="grid grid-cols-4 gap-3">
                @foreach ($youtube as $item)
                    <div class="bg-gray-800 rounded-lg">
                        @if (Auth::user()->isAdmin == true)
                            <div class="flex gap-2 px-3 py-1 justify-end">
                                <a href="{{ route('youtube.edit', $item->id) }}">
                                    <i class="fa-solid fa-pen text-blue-700"></i>
                                </a>
                                <form action=" {{ route('youtube.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="fa-solid fa-trash text-red-700"></button>
                                </form>
                            </div>
                        @endif
                        <a href="{{ route('youtube.show', $item->id) }}" class="cursor-pointer">
                            <div class="rounded-lg">
                                <div class="">
                                    <iframe class="w-full h-full rounded-lg" src="{{ $item->link }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="text-white text-lg font-semibold p-2">
                                <p class="line-clamp-2">{{ $item->judul }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
