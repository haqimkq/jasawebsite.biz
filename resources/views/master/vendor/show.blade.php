<x-app-layout>
    <div class="pl-10 pr-3 py-2 space-y-2">
        <div>
            <select id="vendorSelect" class="rounded-lg bg-gray-600 text-sm text-white">
                <option value="">Lihat Semua</option>
                @foreach ($vendorDomain as $item)
                    <option value="{{ $item->vendor }}" {{ $id == $item->id ? 'selected' : '' }}>{{ $item->vendor }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <table id="tableTodoUser" class=" text-sm text-left text-gray-400 hover stripe w-full">
                <thead
                    class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            Nama Domain
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vendor
                        </th>
                    </tr>
                </thead>
                <tbody class="text-black dark:text-white">
                    @foreach ($vendorDomain as $item)
                        <tr>
                            <td>
                                <ul>

                                    @foreach ($item->domain as $items)
                                        <li>- {{ $items }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $item->vendor }}</td>
                        </tr>
                    @endforeach
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
            dom: 'lrt',
            // searching: false,
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

        function applyFilter() {
            var selectedVendorId = $('#vendorSelect').val();
            console.log(selectedVendorId);
            tableUser.columns(2).search(selectedVendorId).draw();
        }

        applyFilter();

        $('#vendorSelect').on('change', function() {
            applyFilter();
        });
    })
</script>
