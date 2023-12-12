<x-app-layout title="Template Database">

    <div class="mt-10 sm:px-10 px-3">
        <a href="{{ route('daftartemplate.create') }}"
            class=" w-full dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500">Tambah
            Template</a>
        <div class="relative overflow-x-auto shadow-md rounded-lg mt-10">
            <table class="w-full text-xs sm:text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Template
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Thumbnail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Live Preview
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($template as $item)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->index + 1 }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama_template }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="flex justify-center">
                                    <img class="w-20 h-20 object-cover"
                                        src="{{ asset('storage/images/template') }}/{{ $item->image }}" alt="">
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ $item->link }}">{{ $item->link }}</a>
                            </td>
                            <td class="px-6 py-4 text-start whitespace-nowrap">
                                Rp. {{ number_format($item->harga) }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-3 justify-center">
                                    <a href="{{ route('daftartemplate.edit', $item->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <form class="text-center" action="{{ route('daftartemplate.destroy', $item->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
