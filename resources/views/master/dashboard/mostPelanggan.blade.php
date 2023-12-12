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
