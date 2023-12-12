<x-app-layout>
    <div class="flex gap-3 px-10">
        <div class="w-full space-y-3">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="tableFilter">
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                No
                            </th>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                Nama Extensi Domain
                            </th>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                Daftar Domain
                            </th>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                Jumlah Domain
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 0;
                        @endphp
                        @foreach ($result as $tld => $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="py-2 px-[10px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index + 1 }}
                                </th>
                                <td class="py-2 px-[10px] align-top">
                                    {{ $tld }}
                                </td>
                                <td class="py-2 px-[10px] ">
                                    @php
                                        $indexDomain = 0;
                                    @endphp
                                    <ul>
                                        @foreach ($item as $items)
                                            <li>
                                                <p>
                                                    {{ $indexDomain + 1 }}. {{ $items }}.{{ $tld }}
                                                </p>
                                            </li>
                                            @php
                                                $indexDomain++;
                                            @endphp
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="py-2 px-[10px] align-top">
                                    {{ count($item) }}
                                </td>
                            </tr>
                            @php
                                $index++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-2/3">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="tableCount">
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                Nama Extensi Domain
                            </th>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                Jumlah Domain
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $tld => $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="py-2 px-[10px] align-top">
                                    {{ $tld }}
                                </td>
                                <td class="py-2 px-[10px] align-top">
                                    {{ count($item) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#tableFilter').DataTable({
            lengthChange: false,
            scrollY: 370,
            deferRender: true,
            columnDefs: [{
                target: 3,
                visible: false,
            }, ],
            scoller: true,
            info: false,
            paging: false,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf text-white"></i>',
                className: 'datatable-button',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            }, ],
        });
    });
    $(document).ready(function() {
        $('#tableCount').DataTable({
            lengthChange: false,
            scrollY: 370,
            deferRender: true,
            scoller: true,
            info: false,
            paging: false,
        });
    });
</script>
