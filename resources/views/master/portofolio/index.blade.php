<x-app-layout>
    <div class="mx-4 pt-3">

        <div class=" relative overflow-x-auto mt-4 rounded-xl">
            <table class="data-table text-center justify-center stripe hover responsive text-sm">
                <thead class="bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>File</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>

    </div>

    </body>

    <script type="text/javascript">
        $(function() {

            /*------------------------------------------
             --------------------------------------------
             Pass Header Token
             --------------------------------------------
             --------------------------------------------*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*------------------------------------------
            --------------------------------------------
            Render DataTable
            --------------------------------------------
            --------------------------------------------*/
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                paginate: false,
                info: false,
                searching: false,
                ajax: "{{ route('portofolio.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'file',
                        name: 'file',
                        render: function(data, type, full, meta) {
                            url = "{{ asset('storage/images') }}";
                            return '<img class="object-cover mx-auto" src = "' +
                                url +
                                '/' +
                                full.file + '" >';
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Button
            --------------------------------------------
            --------------------------------------------*/
            $('#createNewProduct').click(function() {
                $('#saveBtn').val("create-product");
                $('#product_id').val('');
                $('#productForm').trigger("reset");
                $('#modelHeading').html("Create New Product");
                $('#ajaxModel').modal('show');
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Edit Button
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.editProduct', function() {
                var product_id = $(this).data('id');
                $.get("{{ route('portofolio.index') }}" + '/' + product_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Product");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#product_id').val(data.id);
                    $('#name').val(data.nama);
                    $('#detail').val(data.file);
                })
            });



        });
    </script>

</x-app-layout>
