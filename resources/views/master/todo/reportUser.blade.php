    <x-app-layout title="To Do List">
        <div id="loading" class="loader fixed right-3 top-5 z-50" style="display: none"></div>
        <div class="mx-10 py-3 relative">
            <div class="sm:flex justify-between space-y-2">
                <div class="flex gap-1 items-center">
                    @if ($user->image !== null)
                        <img class="w-20 h-20 object-cover rounded-full"
                            src="{{ asset('storage/images/fotoProfil') }}/{{ $user->image }}" alt="">
                    @else
                        @php
                            $nameParts = explode(' ', $user->name);
                            $initials = '';
                            foreach ($nameParts as $part) {
                                $initials .= strtoupper(substr($part, 0, 1));
                            }
                        @endphp
                        <div class="w-20 h-20 bg-gray-500 flex items-center justify-center rounded-full">
                            <span class="dark:text-white text-black text-2xl">{{ $initials }}</span>
                        </div>
                    @endif
                    <div>
                        <p class="dark:text-white text-black text-xl">{{ $user->name }}</p>
                        <p class="dark:text-gray-300 text-gray-500 text-sm">{{ $user->email }}</p>
                        <p class="dark:text-gray-300 text-gray-500 text-sm">Total <span
                                class="text-base text-yellow-600" id="totalPoints"></span> Points
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-center sm:justify-end">
                    <div class="relative">
                        <input name="start" type="date" id="start"
                            class="bg-blue-900 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date start" value="{{ $start }}">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <input name="end" type="date" id="end"
                            class="bg-blue-900 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date end" value="{{ $end }}">
                    </div>
                </div>
            </div>
            <table id="tableTodoUser" class=" text-sm text-left text-gray-400 hover stripe">
                <thead
                    class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Assigner
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Subject
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Domain
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Tugas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Selesai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Attachment
                        </th>
                        @if (Auth::user()->isAdmin == true)
                            <th scope="col" class="px-6 py-3">
                                Point
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-black dark:text-white">

                </tbody>
            </table>
        </div>
    </x-app-layout>
    <script>
        $(document).ready(function() {

            function fetchData(start, end) {
                $.ajax({
                    url: "/todos/pointUsers/" + {!! $user->id !!} + "/" + start + "/" + end,
                    method: 'GET',
                    success: function(response) {
                        tableUser.clear();
                        tableUser.rows.add(response.data).draw();
                        document.getElementById('totalPoints').textContent = response.data[0].total;
                    },
                    error: function(xhr) {}
                });
            }

            var tableUser = $('#tableTodoUser').DataTable({
                paging: false,
                info: false,
                columnDefs: [{
                    className: "dt-center",
                    targets: [0, 1, 2, 3, 5, 6]
                }],
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv text-white" title="Export CSV"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel text-white" title="Export Excel"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf text-white" title="Export PDF"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print text-white" title="Print Halaman"></i>',
                        className: 'datatable-button',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },

                ],
                searching: false,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'from',
                        name: 'from',
                        render: function(data, type, full, meta) {
                            if (data !== null) {
                                return full.from.name;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: 'subject',
                        name: 'subject',
                        render: function(data) {
                            return '<p class="text-start">' + data + '</p>'
                        }
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
                        data: 'doneAt',
                        name: 'doneAt',
                        render: function(data) {
                            const options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric'
                            };
                            const doneAtDate = new Date(data);
                            const doneAt = doneAtDate.toLocaleDateString('id-ID', options).replace(
                                'pukul', '');

                            return doneAt;
                        }
                    },
                    {
                        data: 'catatan',
                        name: 'catatan',
                        render: function(data) {
                            function nl2br(str) {
                                return str.replace(/(?:\r\n|\r|\n)/g, '<br>');
                            }
                            return '<p class="text-start">' + nl2br(data) + '</p>';
                        }
                    }, {
                        data: 'file',
                        name: 'file',
                        render: function(data, type, full, meta) {
                            function removeCurlyBraces(text) {
                                return text.replace(/\{[^}]*\}/g, '');
                            }
                            let container = '<ul class="grid">';
                            data.forEach(item => {
                                container +=
                                    '<li class="truncate text-blue-500 hover:underline"><a href="/todos/file/download/' +
                                    item.id + '" target="_blank">' +
                                    removeCurlyBraces(
                                        item.nama_file) +
                                    '</a></li>';
                            });
                            container += '</ul>'
                            return container;
                        }
                    },
                    @if (Auth::user()->isAdmin == true)
                        {
                            data: 'point',
                            name: 'point',
                            render: function(data, type, full, meta) {
                                let selectOptions =
                                    '<select data-todo-id="' + full.id +
                                    '" name="point" class="point bg-transparent border-none focus:ring-0 text-blue-500">';
                                for (let i = 1; i <= 10; i++) {
                                    let selected = (data == i) ? 'selected' : '';
                                    selectOptions +=
                                        `<option value="${i}" ${selected}>${i}</option>`;
                                }
                                selectOptions += '</select>';
                                return selectOptions;
                            }
                        }, {
                            data: 'action',
                            name: 'action',
                            sortable: false
                        },
                    @endif
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

            var start = $('#start').val();
            var end = $('#end').val();
            fetchData(start, end);

            $('#start').on('input', function() {
                start = $(this).val();
                fetchData(start, end);
            });
            $('#end').on('input', function() {
                end = $(this).val();
                fetchData(start, end);
            });
            $('body').on('click', '.deleteProduct', function() {
                var todo_id = $(this).data("id");
                $.ajax({
                    method: "DELETE",
                    url: "/todos/delete/" + todo_id,
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        fetchData(selectedMonth);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
            $('body').on('change', '.point', function() {
                var point = $(this).val();
                var todoId = $(this).data('todo-id');
                const loading = document.getElementById('loading');
                loading.style.display = 'block';
                $.ajax({
                    url: '/todos/point/changepoint',
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: todoId,
                        point: point
                    },
                    success: function(response) {
                        loading.style.display = 'none';
                    },
                    error: function(error) {}
                });
            });
        });
    </script>
