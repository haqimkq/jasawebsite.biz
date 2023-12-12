@php
    use Carbon\Carbon;
@endphp
<div id="toDo" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="sm:text-xl text-lg font-semibold text-gray-900 dark:text-white leading-none">
                        To Do List
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="toDo">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="sm:mx-10 mx-2 pb-5">
                <div class="flex justify-end">
                    <div class=" flex-col gap-3 py-3 space-y-1">
                        <p class="dark:text-white text-black text-xs self-end" for="">Records per Page</p>
                        <input class=" rounded dark:bg-gray-900 text-black dark:text-white" type="number"
                            id="limitInput" value="10">
                    </div>
                </div>
                <div class="rounded-lg overflow-x-auto shadow-md shadow-gray-800 border border-white">
                    <div id="pelangganList">
                        <table id="pelangganTable" class="w-full text-sm text-left text-gray-400">
                            <thead
                                class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Pelanggan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Domain
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Domain
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostPelanggan as $item)
                                    <tr
                                        class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                            {{ $item->nama_pelanggan }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($item->domain as $items)
                                                    <li class="text-start">
                                                        {{ $items->nama_domain }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $item->domain_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Skrip JavaScript di dalam view Anda

    document.addEventListener('DOMContentLoaded', function() {
        const limitInput = document.getElementById('limitInput');
        const pelangganTable = document.getElementById('pelangganTable');

        limitInput.addEventListener('input', function() {
            const newLimit = limitInput.value;

            // Kirim permintaan ke server dengan nilai limit yang baru
            fetch(`/mostPelanggan?limit=${newLimit}`)
                .then(response => response.text())
                .then(data => {
                    pelangganTable.innerHTML = data;
                });
        });
    });
</script>
