<x-app-layout title="Domain Database">
    <div class="pt-3  pb-20">
        <div class="px-5">
            <a href="{{ route('domain.create') }}"
                class=" w-full dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500"
                id="createNewProduct">Tambah Domain</a>
            <a href="{{ route('labelDomain.index') }}"
                class=" w-full dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500"
                id="createNewProduct">Label Domain</a>

        </div>
        <div id="myModal" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full overflow-x-hidden overflow-y-hidden md:inset-0 max-h-full">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="flex justify-center items-center h-screen">
                <div class="relative w-full max-h-full max-w-2xl  z-50">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Label Domain
                            </h3>
                            <button type="button"
                                class="modal-remove text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
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
                        <div class="p-3 space-y-5">
                            <a class="editLabel px-3 py-2 my-3 rounded-lg  dark:bg-gray-50 dark:text-black text-white bg-blue-800 "
                                id="editLabel" href="">Edit</a>
                            <div class="border border-white rounded-lg overflow-hidden">
                                <ul id="dataArrayContainer" class=" h-80 overflow-y-scroll p-3"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" relative overflow-x-auto rounded mt-5 sm:mt-0 pb-3 px-5">
            <table class="data-table text-center stripe hover responsive text-sm">
                <thead class="bg-blue-900 text-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th style="text-align: center !important">No</th>
                        <th style="text-align: center !important">Nama Domain</th>
                        <th style="text-align: center !important">Nama Pemilik</th>
                        <th style="text-align: center !important">Nomor Hp</th>
                        <th style="text-align: center !important">Tanggal Expired</th>
                        <th style="text-align: center !important">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            // Pass Header Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Render DataTable
            var table = $('.data-table').DataTable({
                processing: true,
                paging: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        className: 'filterButton',
                        text: '<div class="space-x-2"><input class="rounded-full" type="radio"  name="filter" id="onlyHostingFilter" {{ request()->input('onlyHosting') == 1 ? 'checked' : '' }}><label class="text-white text-sm" for="onlyHostingFilter">Hosting Only ({!! $hostingCount !!})</label></div>',
                        action: function(e, dt, node, config) {
                            var checkbox = $('#onlyHostingFilter');
                            checkbox.prop('checked', !checkbox.prop('checked'));
                            table.ajax.reload();
                        }
                    },
                    {
                        className: 'filterButton',
                        text: '<div class="space-x-2"><input class="rounded-full" type="radio"  name="filter" id="tempDomainFilter"><label class="text-white text-sm" for="tempDomainFilter">Temp Domain ({!! $tempDomainCount !!})</label></div>',
                        action: function(e, dt, node, config) {
                            var checkbox = $('#tempDomainFilter');
                            checkbox.prop('checked', !checkbox.prop('checked'));
                            table.ajax.reload();
                        }
                    },
                    {
                        className: 'filterButton',
                        text: '<div class="space-x-2"><input class="rounded-full" type="radio"  name="filter" id="externalDomain" {{ request()->input('onlyHosting') == 3 ? 'checked' : '' }}><label class="text-white text-sm" for="externalDomain" >External Domain ({!! $externalDomainCount !!})</label></div>',
                        action: function(e, dt, node, config) {
                            var checkbox = $('#externalDomain');
                            checkbox.prop('checked', !checkbox.prop('checked'));
                            table.ajax.reload();
                        }
                    }
                ],
                pagingType: 'simple',
                pageLength: 20,
                serverSide: true,
                lengthChange: false,
                responsive: {
                    details: {
                        renderer: function(api, rowIdx, columns) {
                            let data = columns.map((col, i) => {
                                return col.hidden ?
                                    '<tr class="text-start" data-dt-row="' +
                                    col.rowIndex +
                                    '" data-dt-column="' +
                                    col.columnIndex +
                                    '">' +
                                    '<td class="text-start">' +
                                    col.title +
                                    ':' +
                                    '</td> ' +
                                    '<td class="text-start">' +
                                    col.data +
                                    '</td>' +
                                    '</tr>' :
                                    '';
                            }).join('');

                            let table = document.createElement('table');
                            table.innerHTML = data;

                            return data ? table : false;
                        }
                    }
                },
                language: {
                    'search': '',
                    'searchPlaceholder': 'Search for items'
                },
                info: false,
                order: [
                    [1, 'asc']
                ],
                ajax: {
                    "url": "{{ route('domains.filter') }}",
                    "type": 'POST',
                    "data": function(data) {
                        data.onlyHosting = 0;

                        if ($('#onlyHostingFilter').is(':checked')) {
                            data.onlyHosting = 1;
                        } else if ($('#tempDomainFilter').is(':checked')) {
                            data.onlyHosting = 2;
                        } else if ($('#externalDomain').is(':checked')) {
                            data.onlyHosting = 3;
                        }
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_domain',
                        name: 'nama_domain',
                        render: function(data, type, full, meta) {
                            if (full.pelanggan) {
                                return '<div class=" divide-gray-500 space-y-2"><div class="flex items-center gap-3"></i><a href="/domain/' +
                                    full.slug + '">' + full
                                    .nama_domain +
                                    '</a>';
                            } else {
                                return '<div class=" divide-gray-500 space-y-2"><div class="flex items-center gap-3 text-red-500"></i><a href="/domain/' +
                                    full.slug + '">' + full
                                    .nama_domain +
                                    '</a>';
                            }
                        }
                    },
                    {
                        data: 'pelanggan',
                        name: 'pelanggan',
                        render: function(data, type, full, meta) {
                            if (data) {
                                return '<div class="text-start flex justify-start items-center"><a href="/pelanggan/' +
                                    data.id + '">' +
                                    data.nama_pelanggan + '</a></div>';
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: 'pelanggan.no_hp',
                        name: 'pelanggan.no_hp',
                        render: function(data, type, full, meta) {
                            return '<div class="text-start flex justify-start items-center gap-2"><a style="color: #0b9b01c0;" href="//wa.me/' +
                                data +
                                '/?text=Halo%20Kak%20!" data-toggle="tooltip"  data-id="' + data +
                                '" data-original-title="Wa" class="fa-brands fa-whatsapp fa-xl" title="Whatsapp"></a><p>' +
                                data +
                                '</p></div>';
                        }
                    },
                    {
                        data: 'tanggal_expired',
                        name: 'tanggal_expired',
                        render: function(data, type, full, meta) {
                            var today = new Date();
                            var expiryThreshold = new Date();
                            var tanggal_expired = new Date(data);
                            expiryThreshold.setDate(today.getDate() + 60);

                            var options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            var formattedTanggalExpired = tanggal_expired.toLocaleDateString(
                                'id-ID', options);

                            if (tanggal_expired <= expiryThreshold) {
                                if (today >= tanggal_expired) {
                                    return '<p title="Expired" class="text-red-500 text-start font-extrabold">' +
                                        formattedTanggalExpired + '</p>';
                                } else {
                                    return '<p class="text-amber-500 text-start font-extrabold">' +
                                        formattedTanggalExpired +
                                        '</p>';
                                }
                            } else {
                                return '<p class="dark:text-white text-black text-start font-extrabold">' +
                                    formattedTanggalExpired + '</p>';
                            }
                        }
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            var modalTriggerIcons = document.querySelectorAll(
                                '[data-modal-trigger]');
                            modalTriggerIcons.forEach(function(icon) {
                                document.addEventListener('click', function(event) {
                                    if (event.target && event.target.hasAttribute(
                                            'data-modal-trigger')) {
                                        // Handle click on elements with data-modal-trigger attribute
                                        var modalId = event.target.getAttribute(
                                            'data-modal-trigger');
                                        var modal = document.getElementById(
                                            modalId);
                                        var domainId = event.target.getAttribute(
                                            'data-id');
                                        var modalLabelsContainer = document
                                            .getElementById('dataArrayContainer');
                                        var labelData = event.target.getAttribute(
                                            'data-label');
                                        var labelsArray = JSON.parse(labelData);
                                        var editLabel = document.getElementById(
                                            'editLabel');
                                        editLabel.setAttribute('href', "domains/" +
                                            domainId + "/edit");

                                        modalLabelsContainer.innerHTML = '';

                                        if (labelsArray.length > 0) {
                                            labelsArray.forEach(function(label) {
                                                var labelElement = document
                                                    .createElement('li');
                                                var iconElement = document
                                                    .createElement('i');
                                                var textElement = document
                                                    .createElement('p');

                                                labelElement.setAttribute(
                                                    'class',
                                                    'bg-white dark:border-none border border-blue-800 dark:bg-gray-900 my-2 p-3 rounded-lg flex items-center gap-2'
                                                );
                                                textElement.setAttribute(
                                                    'class',
                                                    'dark:text-white text-black'
                                                );
                                                iconElement.setAttribute(
                                                    'class',
                                                    'fa-solid fa-tag'
                                                );

                                                modalLabelsContainer
                                                    .appendChild(
                                                        labelElement);
                                                labelElement.appendChild(
                                                    iconElement);
                                                labelElement.appendChild(
                                                    textElement);

                                                textElement.textContent =
                                                    label;
                                            });
                                        } else {
                                            var dataArrayContainer = document
                                                .getElementById(
                                                    'dataArrayContainer');
                                            dataArrayContainer.classList.remove(
                                                'h-80');
                                            dataArrayContainer.classList.remove(
                                                'overflow-y-scroll');
                                            var labelElement = document
                                                .createElement('li');
                                            var textElement = document
                                                .createElement('p');

                                            labelElement.setAttribute(
                                                'class',
                                                ' bg-white dark:border-none border border-blue-800 dark:bg-gray-900 my-2 p-3 rounded-lg flex items-center gap-2'
                                            );
                                            textElement.setAttribute(
                                                'class',
                                                'dark:text-white text-black'
                                            );

                                            modalLabelsContainer.appendChild(
                                                labelElement);
                                            labelElement.appendChild(textElement);
                                            textElement.textContent =
                                                "Tidak Ada Label";
                                        }

                                        modal.classList.remove('hidden');
                                        modal.querySelector('.modal-overlay')
                                            .addEventListener('click', function() {
                                                modal.classList.add('hidden');
                                            });
                                        modal.querySelector('.modal-remove')
                                            .addEventListener('click', function() {
                                                modal.classList.add('hidden');
                                            });
                                    }
                                });
                            });
                            return data;
                        }
                    }
                ]
            });
            $('#onlyHostingFilter').click(function(e) {
                e.stopPropagation();
            });

            $('#onlyHostingFilter').change(function() {
                table.ajax.reload();
            });
            $('#tempDomainFilter').click(function(e) {
                e.stopPropagation();
            });

            $('#tempDomainFilter').change(function() {
                table.ajax.reload();
            });
            $('#externalDomain').click(function(e) {
                e.stopPropagation();
            });

            $('#externalDomain').change(function() {
                table.ajax.reload();
            });
            // Create Product Code
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ route('domain.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {

                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });
            // Delete Product Code
            $('body').on('click', '.deleteProduct', function() {

                var product_id = $(this).data("id");

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('domain.store') }}" + '/' + product_id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

        });
    </script>
</x-app-layout>
