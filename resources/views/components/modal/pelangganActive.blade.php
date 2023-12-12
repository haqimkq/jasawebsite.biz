@php
    use Carbon\Carbon;
@endphp
<div id="pelangganActive" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-min max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 border-white border">
            <!-- Modal header -->
            <div
                class="flex items-start justify-between p-2 border-b dark:border-white bg-blue-900 dark:bg-gray-600 rounded-t-lg">
                <h3 class="text-xl font-semibold text-white">
                    Pelanggan Aktif
                </h3>
                <button type="button" id="btn-hide-active"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="pelangganActive">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="my-10 flex justify-center sm:p-0 p-3">
                <div class="rounded-lg overflow-x-auto shadow-md shadow-gray-800 w-full mx-3">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead
                            class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    Nama Pelanggan
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    Daftar Domain
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nomor Hp
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelangganActive as $item)
                                <tr
                                    class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                        {{ $item->nama_pelanggan }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                        <ul>
                                            @foreach ($item->Domain as $items)
                                                <li>
                                                    <a href="{{ route('domain.show', ['slug' => $items->slug]) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        {{ $items->nama_domain }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                        <div class="flex justify-start gap-3 items-center">
                                            <a href="//wa.me/{{ $item->no_hp }}"><i
                                                    class="fa fa-whatsapp fa-lg text-green-500"></i></a>
                                            <p>{{ $item->no_hp }}</p>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
