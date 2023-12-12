<x-app-layout title="Pelanggan Database">
    <div class="pt-3 pb-20">
        <div class="px-5">
            <a href="{{ route('pelanggan.create') }}"
                class=" w-full dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500"
                id="createNewProduct">Tambah Pelanggan</a>
            <a href="{{ route('label.index') }}"
                class=" w-full dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500"
                id="createNewProduct">Label Pelanggan</a>
        </div>
        <div id="myModal" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 z-50 items-center justify-center w-full overflow-x-hidden overflow-y-hidden md:inset-0 h-full max-h-full">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="flex justify-center items-center h-screen">
                <div class="relative w-full max-h-full max-w-2xl  z-50">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Label Pelanggan
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
        <div class="relative overflow-x-auto rounded mt-5 sm:mt-0 pb-3 px-5">
            <table class="data-table text-center stripe  hover responsive text-sm">
                <thead class="bg-blue-900 text-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th style="text-align: center !important">No</th>
                        <th style="text-align: center !important">Nama Pelanggan</th>
                        <th style="text-align: center !important">Nomor Hp</th>
                        <th style="text-align: center !important">Status User</th>
                        <th style="text-align: center !important">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            // Pass Header Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Render DataTable
            var table = $('.data-table').DataTable({
                processing: true,
                pageLength: 20,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print text-white"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        className: 'filterButton',
                        text: '<div class="space-x-2"><input class="rounded-full" type="radio"  name="filter" id="prospekFilter" {{ request()->input('prospekFilter') ? 'checked' : '' }}><label class="text-white text-sm" for="prospekFilter">Prospek ({{ $prospek }})</label></div>',
                        action: function(e, dt, node, config) {
                            var checkbox = $('#prospekFilter');
                            checkbox.prop('checked', !checkbox.prop('checked'));
                            table.ajax.reload();
                        }
                    },
                    {
                        className: 'filterButton',
                        text: '<div class="space-x-2"><input class="rounded-full" type="radio"  name="filter" id="hotProspekFilter" {{ request()->input('hotProspekFilter') ? 'checked' : '' }}><label class="text-white text-sm" for="hotProspekFilter">Hot Prospek ({{ $hotProspek }})</label></div>',
                        action: function(e, dt, node, config) {
                            var checkbox = $('#hotProspekFilter');
                            checkbox.prop('checked', !checkbox.prop('checked'));
                            table.ajax.reload();
                        }
                    }
                ],
                serverSide: true,
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
                paginate: true,
                lengthChange: false,
                language: {
                    'search': '',
                    'searchPlaceholder': 'Search for items'
                },
                info: false,
                ajax: {
                    "url": "{{ route('pelanggans.filter') }}",
                    "type": 'POST',
                    "data": function(data) {
                        data.filter = 0;

                        if ($('#prospekFilter').is(':checked')) {
                            data.filter = 1;
                        } else if ($('#hotProspekFilter').is(':checked')) {
                            data.filter = 2;
                        }
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_pelanggan',
                        name: 'nama_pelanggan',
                        render: function(data, type, full, meta) {
                            var domains = full.domain;
                            var titleText = '';

                            if (domains.length > 0) {
                                titleText = 'Domain:&#10;';
                                domains.forEach(function(domain, index) {
                                    titleText += domain.nama_domain;
                                    if (index < domains.length - 1) {
                                        titleText += '&#10;';
                                    }
                                });
                            } else {
                                titleText = 'Tidak ada Domain'
                            }

                            return '<div class="flex items-center gap-3"><a title="' + titleText +
                                '" href="/pelanggan/' + full.id + ' ">' + full.nama_pelanggan +
                                '</a></div>';
                        }
                    },


                    {
                        data: 'no_hp',
                        name: 'no_hp',
                        render: function(data, type, full, meta) {
                            return '<div class="text-start">' + data + '</div>'
                        }

                    },
                    {
                        data: 'user_id',
                        name: 'user_id',
                        render: function(data, type, full, meta) {
                            if (full.user_id !== 1) {
                                return full.user.name;
                            } else {
                                return '<p class="text-red-600">Tidak Aktif</p>';
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
                                        var icon = event.target;
                                        var modalId = icon.getAttribute(
                                            'data-modal-trigger');
                                        var modal = document.getElementById(
                                            modalId);
                                        var domainId = icon.getAttribute('data-id');
                                        var modalLabelsContainer = document
                                            .getElementById('dataArrayContainer');
                                        var labelData = icon.getAttribute(
                                            'data-label');
                                        var labelsArray = JSON.parse(labelData);
                                        var editLabel = document.getElementById(
                                            'editLabel');
                                        editLabel.setAttribute('href',
                                            "pelanggans/" + domainId + "/edit");

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
                                                'bg-white dark:border-none border border-blue-800 dark:bg-gray-900 my-2 p-3 rounded-lg flex items-center gap-2'
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

            // Create Product Code
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ route('pelanggan.store') }}",
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
            $('#prospekFilter').click(function(e) {
                e.stopPropagation();
            });

            $('#prospekFilter').change(function() {
                table.ajax.reload();
            });
            $('#hotPropekFilter').click(function(e) {
                e.stopPropagation();
            });

            $('#hotPropekFilter').change(function() {
                table.ajax.reload();
            });

            // Delete Product Code
            $('body').on('click', '.deleteProduct', function() {

                var product_id = $(this).data("id");

                var confirmation = confirm(
                    "Menghapus User Akan Menghapus Relasi Domain.\nApakah Anda yakin ingin Menghapus User ?"
                );

                if (confirmation) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('pelanggan.store') }}" + '/' + product_id,
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    </script>



</x-app-layout>
