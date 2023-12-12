<x-app-layout>
    <div class="flex justify-center">
        <div class="p-5 max-w-lg w-full">
            <div class="border border-white rounded-lg">
                <div class="bg-gray-600 text-white p-3 rounded-t-lg">
                    Edit Template
                </div>
                <div class="p-5 ">
                    <form action="{{ route('whatsapp.update', $whatsapp->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-start">Nama
                                Template</label>
                            <div class="space-y-3">
                                <div>
                                    <input type="text" name="nama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Nama Template" value="{{ $whatsapp->nama }}"
                                        required="">
                                </div>
                                <div class="w-full">
                                    <table class="table table-bordered w-full" id="editWhatsapp">
                                        <tr>
                                            <th
                                                class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white text-start">
                                                Nomor Hp</th>
                                            </th>
                                        </tr>
                                        @php $index = 0 @endphp
                                        @foreach ($whatsapp->number as $item)
                                            <tr>
                                                <td class="p-1">
                                                    <input type="text" name="item[{{ $index }}][number]"
                                                        placeholder="Masukan Nomor Whatsapp"
                                                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        value="{{ $item->number }}" />
                                                </td>
                                                @if ($index == 0)
                                                    <td class="p-1 w-10">
                                                        <button type="button" name="addItem" id="addItem"
                                                            class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">+</button>
                                                    </td>
                                                @else
                                                    <td class="p-1"><button type="button"
                                                            class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5  text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 remove-item">-</button>
                                                    </td>
                                                @endif
                                            </tr>
                                            @php $index++ @endphp
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="submit"
                                class="dark:bg-gray-600 bg-blue-900 text-white p-3 rounded shadow-sm focus:outline-none hover:to-blue-800 dark:hover:bg-gray-500 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        var i = JSON.parse('{!! json_encode($index) !!}');

        $("#addItem").click(function() {
            ++i;

            $("#editWhatsapp").append('<tr><td class="p-1"><input type="text" name="item[' + i +
                '][number]" placeholder="Masukan Nomor Whatsapp" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><button type="button" class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5  text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 remove-item">-</button></td></tr>'
            );
        });

        $(document).on('click', '.remove-item', function() {
            $(this).parents('tr').remove();
        });
    </script>
</x-app-layout>
