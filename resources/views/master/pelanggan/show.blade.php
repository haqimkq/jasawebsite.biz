<x-app-layout>

    <section class="bg-white dark:bg-gray-900 py-3 mx-3 flex lg:flex-row flex-col-reverse gap-2">
        <div class=" relative overflow-x-auto rounded mt-5 sm:mt-0 pb-3 sm:pl-8 lg:w-2/3 w-full">
            <p class="text-white text-lg font-extrabold">Daftar Domain</p>
            <table class="data-table text-center stripe hover responsive text-sm">
                <thead class="bg-blue-900 text-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th style="text-align: center !important">No</th>
                        <th style="text-align: center !important">Nama Domain</th>
                        <th style="text-align: center !important">Nomor Hp</th>
                        <th style="text-align: center !important">Tanggal Expired</th>
                        <th style="text-align: center !important">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="lg:px-0 mx-auto mt-5 lg:w-1/3 w-full lg:pb-6 lg:pt-0 dark:bg-gray-900 ">
            <div class="rounded-xl border border-black dark:border-white">
                <div class="sm:grid gap-2 sm:grid-cols-2 sm:gap-2">
                    {{-- header --}}
                    <div
                        class=" sm:p-3 p-3 items-center justify-between flex col-span-2 font-medium text-left text-gray-500 rounded-t-xl bg-blue-900 dark:bg-gray-600">

                        <div class="col-span-1">
                            <p class="text-white font-black font-sans tracking-widest text-xl flex-auto">
                                {{ $pelanggan->nama_pelanggan }}</p>
                        </div>
                    </div>
                </div>
                <div class="sm:grid gap-4 sm:grid-cols-2 sm:gap-6 mt-2 px-4 py-2 space-y-2">
                    <div class="grid grid-cols-4 col-span-2 ">
                        <label for="alamat"
                            class="col-span-1 block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-gray-300">Alamat</label>
                        <p class="col-span-3 text-gray-900 text-xs sm:text-sm block w-full dark:text-gray-300">
                            {{ $pelanggan->alamat }}</p>
                    </div>
                    <div class="grid grid-cols-4 col-span-2">
                        <label for="no_hp"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-gray-300">Nomor
                            Hp</label>
                        <p class="col-span-3 text-gray-900 text-xs sm:text-sm  block w-full dark:text-gray-300">
                            {{ $pelanggan->no_hp }}
                        <p>
                    </div>
                    <div class="grid grid-cols-4 col-span-2">
                        <label for="link_history"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-gray-300">Link
                            History</label>
                        <div class="col-span-3 text-blue-500 text-xs sm:text-sm block w-full">
                            <a href="//{{ $pelanggan->link_history }}" class="">{{ $pelanggan->link_history }}</a>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 col-span-2">
                        <label for="status_domain"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-gray-300">Daftar
                            Invoice</label>
                        <select onchange="location = this.value;" id="status_domain" name="status_domain"
                            class="col-span-3 text-gray-900 text-xs sm:text-sm dark:text-gray-300 border dark:bg-gray-600 rounded">
                            <option selected disabled>Lihat Semua Daftar Invoice</option>
                            @foreach ($pelanggan->invoice_pelanggan as $item)
                                <option value="{{ route('inv.index') }}">{{ $item->nomor_invoice }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-4 col-span-2">
                        <label for="keterangan_pelanggan"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-gray-300">Keterangan</label>
                        <textarea disabled id="keterangan_pelanggan" name="keterangan_pelanggan" rows="8"
                            class=" col-span-3 h-40 block w-full text-xs sm:text-sm text-gray-900 dark:text-gray-300 dark:bg-gray-600 rounded">{{ $pelanggan->keterangan_pelanggan }}</textarea>
                    </div>
                    <div class="flex col-span-2 gap-3 justify-center">
                        <button onclick="history.back()"
                            class=" bg-blue-900 dark:bg-gray-600 w-32 text-white p-3 rounded shadow-sm focus:outline-none dark:hover:bg-gray-800 hover:bg-indigo-700  items-center px-5 py-2.5 text-xs sm:text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Kembali
                        </button>
                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                            class=" bg-blue-900 dark:bg-gray-600 w-32 text-white p-3 rounded shadow-sm focus:outline-none dark:hover:bg-gray-800 hover:bg-indigo-700  items-center px-5 py-2.5 text-xs sm:text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 flex justify-center">
                            <p>
                                Edit
                            </p>
                        </a>
                        <a href="{{ route('pelangganInvoice', $pelanggan->id) }}"
                            class=" bg-blue-900 dark:bg-gray-600 w-32 text-white p-3 rounded shadow-sm focus:outline-none dark:hover:bg-gray-800 hover:bg-indigo-700  items-center px-5 py-2.5 text-xs sm:text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Buat Invoice
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        text: '<div class="space-x-2"><input class="rounded-full" type="checkbox" id="onlyHostingFilter" {{ request()->input('onlyHosting') ? 'checked' : '' }}><label class="text-white text-sm" for="onlyHostingFilter">Hosting Only ({!! $hostingCount !!})</label></div>',
                        action: function(e, dt, node, config) {
                            var checkbox = $('#onlyHostingFilter');
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
                // render: {
                //     'display': 'display'
                // },
                language: {
                    'search': '',
                    'searchPlaceholder': 'Search for items'
                },
                info: false,
                order: [
                    [1, 'asc']
                ],
                ajax: {
                    "url": "/pelanggans/domain/" + {!! $pelanggan->id !!},
                    "type": 'POST',
                    "data": function(data) {
                        data.onlyHosting = $('#onlyHostingFilter').is(':checked') ? 1 :
                            0;
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
                            return '<div class=" divide-gray-500 space-y-2"><div class="flex items-center gap-3"></i><a href="/domain/' +
                                full.slug + '">' + full
                                .nama_domain +
                                '</a>';
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
