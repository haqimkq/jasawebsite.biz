<x-app-layout>
    <div class="mx-10 py-3 relative">
        <div class="rounded-lg overflow-hidden">
            <table id="tableTodoUser" class=" text-sm text-left text-gray-400 hover stripe w-full">
                <thead
                    class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Subject
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Domain
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Request
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="text-black dark:text-white">

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var tableUser = $('#tableTodoUser').DataTable({
            info: false,
            paging: false,
            ajax: '{{ route('todoTemp.index') }}',
            searching: false,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'from',
                    name: 'from',
                    render: function(data) {
                        return data.name;
                    }
                },
                {
                    data: 'subject',
                    name: 'subject',
                },
                {
                    data: 'domains',
                    name: 'domains',
                    render: function(data) {
                        return data.nama_domain;
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        const options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: 'numeric',
                            minute: 'numeric'
                        };
                        const createdAtDate = new Date(data);
                        const createdAt = createdAtDate.toLocaleDateString('id-ID', options)
                            .replace('pukul', '');

                        return createdAt;
                    }
                },
                {
                    data: 'catatan',
                    name: 'catatan',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'action',
                    name: 'action',
                    sortable: false
                },
            ],
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
        });

        $('body').on('click', '.deleteProduct', function() {

            var todo_id = $(this).data("id");
            $.ajax({
                method: "DELETE",
                url: "/todoTemp/" + todo_id,
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    tableUser.ajax.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    })
</script>
