<x-app-layout title="User Database">
    <div class="py-3">
        <button class="my-3 sm:my-0 px-5">
            <a href="{{ route('user.create') }}"
                class=" w-full dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500"
                id="createNewProduct">Tambah User</a>
        </button>
        <div class="overflow-x-auto px-5">
            <table class="data-table text-center stripe hover responsive text-sm ">
                <thead class="bg-blue-900 text-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-start"></tbody>
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
                processing: false,
                paginate: false,
                // pageLength: 50,
                serverSide: true,
                lengthChange: false,
                responsive: true,
                language: {
                    'search': '',
                    'searchPlaceholder': 'Search for items'
                },
                info: false,
                ajax: "{{ route('user.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                        render: function(data, type, full, meta) {
                            if (full.email_verified_at !== null) {
                                return '<p class="dark:text-green-400 text-green-600">' + full
                                    .email + '</p>'
                            } else {
                                return '<p class="dark:text-red-400 text-red-600">' + full.email +
                                    '</p>'
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });


            // Delete Product Code
            $('body').on('click', '.deleteProduct', function() {
                var product_id = $(this).data("id");

                var confirmation = confirm(
                    "Apakah Anda yakin ingin Menghapus User ?"
                );

                if (confirmation) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('user.store') }}" + '/' + product_id,
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
