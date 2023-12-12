<x-app-layout title="Domain Expired Database">
    <div class="pt-3 pb-10">
        <div class="px-5 gap-2 flex">
            <div>
                <a href="{{ route('domain.index') }}" class="" id="createNewProduct">
                    <button
                        class="w-full p-3 dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500 rounded text-xs sm:text-sm shadow-sm">
                        Semua Domain
                    </button>
                </a>
            </div>
            <div>
                <select id="expiryRange"
                    class=" dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 pl-3 pr-7 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500 h-full">
                    <option value="30" selected> 30 Hari</option>
                    <option value="60"> 60 Hari</option>
                    <option value="90"> 90 Hari</option>
                </select>
            </div>
        </div>
        <div class=" relative overflow-x-auto rounded mt-5 sm:mt-0 pb-3 px-5">
            <table class="data-table text-center stripe hover responsive text-sm">
                <thead class="bg-blue-900 text-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
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


            const expiredRange = document.getElementById('expiryRange');
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
                    url: '/get/domain/expiredSoon/' + expiredRange.value,
                    dataSrc: '',
                },
                columns: [{
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
                        data: 'pelanggan.nama_pelanggan',
                        name: 'pelanggan.nama_pelanggan',
                        render: function(data, type, full, meta) {
                            return '<div class="text-start flex justify-start items-center"><a href="/pelanggan/' +
                                full.pelanggan.id + '">' +
                                data + '</a></div>';
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
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {

                            return '<a  style="color: #171dd4c4;" href="/domain/' + data +
                                '/edit/" data-toggle="tooltip"  data-id="' + data +
                                '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen "></a>';
                        }
                    }
                ]
            });

            expiredRange.addEventListener('change', function() {
                const expiredRangeValue = expiredRange.value;
                table.ajax.url('/get/domain/expiredSoon/' + expiredRange.value).load();
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
