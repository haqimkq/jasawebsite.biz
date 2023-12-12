<x-app-layout>
    <div class="flex gap-3 px-10">
        <div class="w-full space-y-3">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg space-y-3">
                <button id="startButton">Mulai</button>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="tableCheck">
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                No
                            </th>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                Nama Domain
                            </th>
                            <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                <div class="flex items-center justify-between gap-5">
                                    <p>Status</p>
                                    <div id="loading" class="loader" style="display:none"></div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($excelDomains as $domain)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="py-2 px-[10px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td class="py-2 px-[10px] align-top">
                                    {{ $domain }}

                                </td>
                                <td class="py-2 px-[10px]" id="status_{{ $loop->index }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="grid grid-cols-2 gap-3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="activeDomainsTable">
                        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                    No
                                </th>
                                <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                    Nama Domain
                                </th>
                                <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                    <div class="flex items-center justify-between gap-5">
                                        <p>Status</p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="py-2 px-[10px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                </th>
                                <td class="py-2 px-[10px] align-top">
                                </td>
                                <td class="py-2 px-[10px]">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="inactiveDomainsTable">
                        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                    No
                                </th>
                                <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                    Nama Domain
                                </th>
                                <th scope="col" class="" style="padding: 10px 26px 10px 10px">
                                    <div class="flex items-center justify-between gap-5">
                                        <p>Status</p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="py-2 px-[10px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                </th>
                                <td class="py-2 px-[10px] align-top">
                                </td>
                                <td class="py-2 px-[10px]">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        var excelDomains = JSON.parse('{!! json_encode($excelDomains) !!}');
        var loading = document.getElementById('loading');
        var isRunning = false;
        var activeDomains = [];
        var inactiveDomains = [];

        var tableCheck = $('#tableCheck').DataTable({
            lengthChange: false,
            scrollY: 370,
            deferRender: true,
            scroller: true,
            info: false,
            paging: false,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf text-white"></i>',
                className: 'datatable-button',
                exportOptions: {
                    columns: [0, 1, 2]
                }
            }],
            columnDefs: [{
                targets: 2, // Kolom "Status" (kolom 2)
                render: function(data, type, full, meta) {
                    var domain = data;
                    var statusContainer = document.getElementById('status_' + full[0]);
                    if (statusContainer) {
                        return statusContainer.innerHTML;
                    }
                    return '';
                }
            }],
        });

        $('#startButton').click(function() {
            if (!isRunning) {
                isRunning = true;
                startChecking();
            }
        });

        function checkStatus(domain, index) {
            loading.style.display = 'block';
            return new Promise(function(resolve, reject) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/check/domain/get/' + domain, true);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        loading.style.display = 'none';
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            var statusContainer = document.getElementById('status_' + index);
                            statusContainer.innerHTML = response.status;

                            if (response.status === 'Aktif') {
                                activeDomains.push(domain);
                            } else {
                                inactiveDomains.push(domain);
                            }
                            resolve();
                        } else {
                            reject();
                        }
                    }
                };
                xhr.send();
            });
        }

        var currentIndex = 0;

        function startChecking() {
            currentIndex = 0;
            checkNextDomain();
        }

        function checkNextDomain() {
            if (isRunning && currentIndex < excelDomains.length) {
                var domain = excelDomains[currentIndex];
                checkStatus(domain, currentIndex)
                    .then(function() {
                        currentIndex++;
                        checkNextDomain();
                    })
                    .catch(function() {
                        currentIndex++;
                        checkNextDomain();
                    });
            } else {
                isRunning = false;
                createActiveDomainsTable(activeDomains);
                createInactiveDomainsTable(inactiveDomains);
            }
        }

        function createActiveDomainsTable(activeDomains) {
            // Buat DataTable baru untuk domain Aktif
            $('#activeDomainsTable').DataTable({
                data: activeDomains.map(function(domain, index) {
                    return [index + 1, domain, 'Aktif'];
                }),
                lengthChange: false,
                scrollY: 370,
                deferRender: true,
                scroller: true,
                info: false,
                paging: false,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }
                ],
            });
        }

        function createInactiveDomainsTable(inactiveDomains) {
            $('#inactiveDomainsTable').DataTable({
                data: inactiveDomains.map(function(domain, index) {
                    return [index + 1, domain, 'Tidak Aktif'];
                }),
                lengthChange: false,
                scrollY: 370,
                deferRender: true,
                scroller: true,
                info: false,
                paging: false,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }
                ],
            });
        }
    });
</script>
