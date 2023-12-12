<div id="addWa" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 border-white border">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Template
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="addWa">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-5">
                <form action="{{ route('whatsapp.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <label for="nama_pelanggan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Template</label>
                        <div class="space-y-3">
                            <div>
                                <input type="text" name="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Nama Template" required="">
                            </div>
                            <div class="w-full">
                                <table class="table table-bordered w-full" id="dynamicTable">
                                    <tr>
                                        <th
                                            class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white text-start">
                                            Nomor Hp</th>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            <input type="text" name="item[0][number]"
                                                placeholder="Masukan Nomor Whatsapp"
                                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                        </td>
                                        <td class="p-1 w-10">
                                            <button type="button" name="add" id="add"
                                                class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5    text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">+</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="  dark:bg-gray-600 bg-blue-900 text-white p-3 rounded shadow-sm focus:outline-none hover:to-blue-800 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Simpan
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    var i = 0;

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append('<tr><td class="p-1"><input type="text" name="item[' + i +
            '][number]" placeholder="Masukan Nomor Whatsapp" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><button type="button" class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5  text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 remove-tr">-</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
