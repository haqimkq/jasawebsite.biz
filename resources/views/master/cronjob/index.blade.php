<x-app-layout title="To Do List">
    <div class="pl-10">
        <a href="{{ route('cronjob.create') }}"
            class=" w-full dark:bg-gray-600 bg-blue-900 text-white dark:text-gray-300 p-3 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500"
            id="createNewProduct">Tambah Routine Todo List</a>

    </div>
    <div class="mx-10 py-3 relative">
        <table id="tableTodoUser" class=" text-sm text-left text-gray-400 hover stripe">
            <thead
                class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                <tr>
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
                        Catatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jadwal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-black dark:text-white">
            </tbody>
        </table>


    </div>
</x-app-layout>
<script>
    $(document).ready(function() {

        var table = $('#tableTodoUser').DataTable({
            paging: false,
            info: false,
            ajax: "{{ route('cronjob.index') }}",
            searching: false,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'users',
                    name: 'users',
                    render: function(data) {
                        if (data && data.length > 0) {
                            return data.map((user) => {
                                return user.name;
                            }).join('<br> ');
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'subject',
                    name: 'subject'
                },
                {
                    data: 'domains',
                    name: 'domains',
                    render: function(data) {
                        if (data && data.length > 0) {
                            return data.map((domain) => {
                                return domain.nama_domain;
                            }).join(', ');
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'catatan',
                    name: 'catatan'
                },
                {
                    data: 'time',
                    name: 'time',
                    render: function(data, type, full, meta) {
                        return '<p> Tanggal ' + full.date + ' Jam ' + full.time + '</p>';
                    }
                },
                {
                    data: 'action',
                    name: 'action'
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

            var product_id = $(this).data("id");

            $.ajax({
                type: "DELETE",
                url: '/cronjob/' + product_id,
                data: {
                    "_token": $('meta[name="csrf-token"]').attr(
                        'content')
                },
                success: function(data) {
                    table.ajax.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
