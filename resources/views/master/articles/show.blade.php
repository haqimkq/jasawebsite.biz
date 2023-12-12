<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200  leading-tight">
            {{ __('Article List') }}
        </h2>
    </x-slot>

    <div class="px-10 py-3 space-y-3">
        <div class="text-white">
            <div class="rounded-lg overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead
                        class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Article
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spin as $item)
                            @foreach ($item->spunArticles as $items)
                                <tr
                                    class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-800 dark:border-gray-700 text-start">
                                    <td
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white items-start border-gray-600 border-r text-center w-10">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white border-gray-600 border-x">
                                        {{ $items->spun_title }}
                                    </td>
                                    <td class="px-6 my-4 font-medium text-gray-900 dark:text-white line-clamp-2 ">
                                        <a href="{{ route('article.show', $item->id) }}">
                                            {!! $items->spun_article !!}
                                        </a>
                                    </td>
                                    <td
                                        class="px-6 my-4 font-medium text-gray-900 dark:text-white border-gray-600 border-l w-10">
                                        <div class="flex gap-3 justify-center ">
                                            <a href="{{ route('article.edit', $items->id) }}" title="Edit">
                                                <i class="fa-solid fa-pen fa-lg"></i>
                                            </a>
                                            <form action="{{ route('articles.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button>
                                                    <i title="Delete" class="fa-solid fa-delete-left fa-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
