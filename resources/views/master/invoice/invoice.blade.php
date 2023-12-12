<x-app-layout>

    <section class="bg-white dark:bg-gray-900">

        <div class="py-1 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Buat Invoice</h2>
            <form action="{{ route('invoiceStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-2 grid-cols-2 sm:grid-cols-2 sm:gap-6">
                    <div class="flex justify-center col-span-2">
                        <div class="relative">
                            {{-- @if (count($pelanggans) > 0)
                                <img id="fotoProfil" class="object-cover w-52 h-52"
                                    src="{{ asset('storage/images/fotoProfil') }}/{{ $pelanggans[0]->image }}"
                                    alt="">
                            @else --}}
                            <img id="fotoProfil" class="object-contain sm:h-52 h-36"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/images/logo/logo.png'))) }}"
                                alt="">
                            {{-- @endif --}}

                            <div class="absolute top-0 z-10  opacity-0 hover:opacity-100">
                                <label for="fotoProfilInput">
                                    <div class="sm:w-52 w-36 sm:h-52 h-36 bg-black opacity-60 flex items-center">
                                        <p class="text-center w-full"><i class="fa-solid fa-pen"
                                                style="color: #ffffff;"></i>
                                        </p>
                                    </div>
                                    <input accept="image/*" type='file' name="logo" class="hidden"
                                        id="fotoProfilInput" />
                                </label>
                                <p id="deleteFotoProfil"
                                    class="absolute top-2 right-2 text-white opacity-0 hover:opacity-100">
                                    <i class="fa-solid fa-trash"></i>
                                </p>
                            </div>
                            <script>
                                const fotoProfil = document.getElementById('fotoProfil');
                                const fotoProfilInput = document.getElementById('fotoProfilInput');
                                const deleteFotoProfil = document.getElementById('deleteFotoProfil');

                                deleteFotoProfil.addEventListener('click', () => {
                                    fotoProfil.src =
                                        "data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/images/logo/logo.png'))) }}";
                                    fotoProfilInput.value = 'cek';
                                });

                                fotoProfilInput.onchange = evt => {
                                    const [file] = fotoProfilInput.files;
                                    if (file) {
                                        fotoProfil.src = URL.createObjectURL(file);
                                    }
                                };
                            </script>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="nama_domain"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Invoice</label>
                        <input type="text" name="nomor_invoice" id="nama_domain"
                            class=" bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" value="{{ $id }}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="epp_code"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Bill
                            Date</label>
                        <input type="date" name="bill_date" id="epp_code"
                            class="bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $today->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="epp_code"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Due
                            Date</label>
                        <input type="date" name="due_date" id="epp_code"
                            class="bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="nama_domain"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Nama
                            Penerima</label>
                        <input type="text" name="nama_penerima" id="nama_domain"
                            class=" bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="nama_domain"
                            class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Nama
                            Perusahaan
                            Penerima</label>
                        <input type="text" name="nama_perusahaan" id="nama_domain"
                            class=" bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="">
                    </div>
                    <table class="table table-bordered col-span-2" id="dynamicTable">
                        <tr>
                            <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white">Item</th>
                            <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white">Quantity</th>
                            <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white">Price</th>
                            <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white"></th>
                        </tr>
                        <tr>
                            <td class="p-1">
                                <input type="text" name="item[0][name]" placeholder="Enter your Name"
                                    class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required />
                            </td>
                            <td class="p-1">
                                <input type="number" name="item[0][qty]" placeholder="Enter your Qty"
                                    class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required />
                            </td>
                            <td class="p-1">
                                <input type="number" name="item[0][price]" placeholder="Enter your Price"
                                    class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required />
                            </td>
                            <td class="p-1">
                                <button type="button" name="add" id="add"
                                    class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5    text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">+</button>
                            </td>
                        </tr>
                    </table>



                </div>
                <button type="submit"
                    class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">
                    Buat Invoice
                </button>
            </form>

        </div>
    </section>

</x-app-layout>

<script type="text/javascript">
    var i = 0;

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append('<tr><td class="p-1"><input required type="text" name="item[' + i +
            '][name]" placeholder="Enter your Name" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><input required type="number" name="item[' +
            i +
            '][qty]" placeholder="Enter your Qty" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><input required type="number" name="item[' +
            i +
            '][price]" placeholder="Enter your Price" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><button type="button" class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5  text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 remove-tr">-</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
