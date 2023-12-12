<x-app-layout title="Label Pelanggan">

    <div class="mx-10 py-10">
        <div class="flex items-center my-2">
            <button type="button"
                class="p-2 text-sm  bg-blue-900 dark:bg-gray-700 rounded-lg border border-gray-600 text-gray-300"
                data-modal-target="labelModal" data-modal-toggle="labelModal">Tambah Label</button>
        </div>
        @include('components.modal.addLabel')
        <div class="rounded-lg overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-400">
                <thead
                    class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Label
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Daftar Pelanggan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($label as $item)
                        <tr
                            class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                            <th scope="row"
                                class=" font-medium text-gray-900 whitespace-nowrap dark:text-white text-start px-3">
                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-tag" style="color: {{ $item->color }}"></i>
                                    <p class="capitalize">{{ $item->name }}</p>
                                </div>
                            </th>
                            <th scope="row"
                                class=" font-medium text-gray-900 whitespace-nowrap dark:text-white text-start px-3">

                                <div class="flex justify-center items-center">
                                    <button id="domainLabel-{{ $item->id }}"
                                        data-dropdown-toggle="domainL-{{ $item->id }}"
                                        class="dark:text-white text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">Lihat Daftar Pelanggan <svg
                                            class="w-2.5 h-2.5 ml-2.5 self-center" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <button data-modal-target="addLabelPelangganModal-{{ $item->id }}"
                                        data-modal-toggle="addLabelPelangganModal-{{ $item->id }}"
                                        class="block rounded-full text-white dark:text-black w-5 h-5 text-center bg-orange-600 dark:bg-gray-300">
                                        +
                                    </button>
                                    <x-modal.addLabelPelangganModal :pelanggan="$pelanggan" :label="$item->pelanggan"
                                        name="{{ $item->name }}" id="{{ $item->id }}" />
                                    <!-- Dropdown menu -->
                                    <div id="domainL-{{ $item->id }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 border-blue-900 dark:border-white border">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="domainLabel-{{ $item->id }}">
                                            @if ($item->pelanggan->isEmpty())
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white lg:min-w-[200px] text-start">Tidak
                                                        ada pelanggan</a>
                                                </li>
                                            @else
                                                @foreach ($item->pelanggan as $items)
                                                    <li>
                                                        <a href="{{ route('pelanggan.show', $items->id) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white lg:min-w-[200px] text-start">{{ $items->nama_pelanggan }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                            </th>
                            <td class="">
                                <div class="flex gap-3 justify-center">
                                    <a href="{{ route('label.edit', $item->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <div>
                                        <form action="{{ route('label.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
