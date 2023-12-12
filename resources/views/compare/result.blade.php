<x-app-layout>
    <div class="flex gap-3 px-10">
        <div class="w-full space-y-3">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="tabelTrue">
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                No
                            </th>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                Nama Domain
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 0;
                        @endphp
                        @foreach ($results as $key => $result)
                            @if ($result == 1)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="py-2 px-[10px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="py-2 px-[10px] text-green-500">
                                        {{ $excelDomains[$key] }}
                                    </td>
                                </tr>
                                @php
                                    $index++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full space-y-3">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="tabelFalse">
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class=""style="padding: 10px 26px 10px 10px">
                                No
                            </th>
                            <th scope="col" class=""style="padding: 10px 26px 10px 10px">
                                Nama Domain
                            </th>
                            <th scope="col" class=" text-center"style="padding: 10px 26px 10px 10px">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 0;
                        @endphp
                        @foreach ($results as $key => $result)
                            @if ($result == 0)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="py-2 px-[10px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="py-2 px-[10px] text-red-500">
                                        {{ $excelDomains[$key] }}
                                    </td>
                                    <td class="py-2 px-[10px]">
                                        <div class="flex justify-center">
                                            <a href="{{ route('domain.create') }}?domain={{ $excelDomains[$key] }}">
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $index++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#tabelTrue').DataTable({
            lengthChange: false,
            scrollY: 370,
            deferRender: true,
            scoller: true,
            info: false,
            paging: false,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv text-white"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [1]
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel text-white"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [1]
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf text-white"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [1]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print text-white"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [1]
                    }
                }
            ],
        });
    });
    $(document).ready(function() {
        $('#tabelFalse').DataTable({
            lengthChange: false,
            scrollY: 370,
            deferRender: true,
            scoller: true,
            info: false,
            paging: false,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv text-white"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel text-white"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf text-white"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print text-white"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [0, 1]
                    }
                }
            ],
        });
    });
</script>
