<x-app-layout title="To Do List">

    <div class="mx-10 py-3 relative">
        <div class="flex items-center justify-center sm:justify-end">
            <div class="relative">
                <input name="start" type="date" id="start"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date start">
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <input name="end" type="date" id="end"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date end">
            </div>
        </div>
        {{-- <div class=" w-full top-0 absolute z-50 flex sm:block justify-center">
            <input type="month" id="input-month"
                class="bg-blue-900 dark:bg-gray-600 text-white rounded-lg text-sm border border-black mx-auto w-[245px]">
        </div> --}}
        {{-- <div class=" w-full top-0 absolute z-30 flex sm:block justify-center">
            <input type="month" id="filterMonth"
                class="bg-blue-900 dark:bg-gray-600 text-white rounded-lg text-sm border border-black mx-auto w-[200px]"
                name="filterMonth" value="{{ date('Y-m') }}">
        </div> --}}


        {{-- <table id="tableTodo" class=" text-sm text-left text-gray-400 hover stripe">
            <thead
                class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Domain
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subject
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Tugas</th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Selesai</th>
                    <th scope="col" class="px-6 py-3">
                        Point</th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-black dark:text-white">

            </tbody>
        </table> --}}
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
                        Point
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
    document.addEventListener("DOMContentLoaded", function() {
        const currentDate = new Date();
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
        const lastDayFormatted = currentDate.getFullYear() + '-' + ((currentDate.getMonth() + 1).toString()
            .padStart(2, '0')) + '-' + lastDay.getDate().toString().padStart(2, '0');

        const endInput = document.querySelector('input[name="end"]');
        endInput.value = lastDayFormatted;
    });

    document.addEventListener("DOMContentLoaded", function() {
        const currentDate = new Date();
        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const firstDayFormatted = currentDate.getFullYear() + '-' + ((currentDate.getMonth() + 1).toString()
            .padStart(2, '0')) + '-' + firstDay.getDate().toString().padStart(2, '0');

        const startInput = document.querySelector('input[name="start"]');
        startInput.value = firstDayFormatted;
    });
</script>

<script>
    $(document).ready(function() {


        function fetchData(start, end) {
            $.ajax({
                url: "{{ route('todos.getPoint') }}",
                method: 'GET',
                data: {
                    start: start,
                    end: end
                },
                success: function(response) {
                    tableUser.clear();

                    tableUser.rows.add(response.data).draw();
                },
                error: function(xhr) {}
            });
        }

        var tableUser = $('#tableTodoUser').DataTable({
            paging: false,
            info: false,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv text-white" title="Export CSV"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel text-white" title="Export Excel"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf text-white" title="Export PDF"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print text-white" title="Print Halaman"></i>',
                    className: 'datatable-button',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },

            ],
            searching: false,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'name',
                    name: 'name',
                    render: function(data, type, full, meta) {
                        var nameParts = full.name.split(' ');
                        var initials = '';
                        for (var i = 0; i < nameParts.length; i++) {
                            initials += nameParts[i].charAt(0).toUpperCase();
                        }
                        if (full.image !== null) {
                            return `
                                    <div class="flex items-center gap-2">
                                        <div>
                                            <img class="w-14 h-14 object-cover rounded-full" src="{{ asset('storage/images/fotoProfil') }}/${full.image}">
                                        </div>
                                        <p>${data}</p>
                                    </div>
                                        `;
                        } else {
                            return `
                                    <div class="flex items-center gap-2">
                                        <div class="w-14 h-14 bg-gray-500 flex items-center justify-center rounded-full">
                                            <span class="text-white text-2xl">${initials}</span>
                                        </div> 
                                        <p>${data}</p>
                                    </div>
                                        `;

                        }
                    }
                },
                {
                    data: 'todos',
                    name: 'todos',
                    render: function(data) {
                        let totalPoints = 0;
                        if (Array.isArray(data)) {
                            data.forEach(function(todo) {
                                totalPoints += todo.point ? parseInt(todo.point) : 0;
                            });
                        }
                        return totalPoints;
                    }
                },
                {
                    data: 'id',
                    name: 'id',
                    render: function(data) {
                        const start = $('#start').val();
                        const end = $('#end').val();
                        return '<div class="text-center w-full"><a target="_blank" href="/todos/pointUser/' +
                            data + '/' + start + '/' + end +
                            '" class="text-blue-500">Details</a></div>';
                    }
                },
            ],
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
    });
</script>
