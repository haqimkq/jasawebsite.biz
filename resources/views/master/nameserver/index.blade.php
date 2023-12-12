<x-app-layout title="Nameserver Database">
    <div class=" pt-3">
        <div class="px-5">
            <a href="{{ route('nameserver.create') }}"
                class=" w-full dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500"
                id="createNewProduct">Tambah Nameserver</a>
        </div>
        <div class="px-5 relative overflow-x-auto mt-4 rounded">
            <table class="data-table text-center stripe hover responsive text-sm">
                <thead class="bg-blue-900 text-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th>No</th>
                        <th>Nameserver 1</th>
                        <th>Nameserver 2</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Action</th>
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
                processing: false,
                paginate: false,
                // pageLength: 50,
                serverSide: true,
                language: {
                    'search': '',
                    'searchPlaceholder': 'Search for items'
                },
                lengthChange: false,
                info: false,
                ajax: "{{ route('nameserver.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nameserver1',
                        name: 'nameserver1'
                    },
                    {
                        data: 'nameserver2',
                        name: 'nameserver2'
                    },
                    {
                        data: 'tanggal_ns',
                        name: 'tanggal_ns'
                    },
                    {
                        data: 'status_ns',
                        name: 'status_ns'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Create Product Code
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ route('nameserver.store') }}",
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
                    url: "{{ route('nameserver.store') }}" + '/' + product_id,
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
