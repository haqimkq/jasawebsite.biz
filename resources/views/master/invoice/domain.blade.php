    <x-app-layout title="Buat Invoice">

        <section class="bg-white dark:bg-gray-900">

            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Buat Invoice</h2>
                <form action="{{ route('invoiceDomainStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-2 grid-cols-2 sm:grid-cols-2 sm:gap-6">
                        <div class="flex justify-center col-span-2">
                            <div class="relative">
                                <img id="fotoProfil" class="object-contain sm:h-52 h-36"
                                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/images/logo/logo.png'))) }}"
                                    alt="">

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
                                placeholder="" value="{{ $id }}" required>
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
                                value="{{ $domain->pelanggan->nama_pelanggan }}" required>
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
                        <div class="col-span-2 sm:col-span-1 hidden">
                            <label for="nama_domain"
                                class=" block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Domain
                                ID</label>
                            <input type="text" name="id_domain" id="nama_domain"
                                class=" bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $domain->id }}" required>
                        </div>
                        <div class="col-span-2">
                            <label for="nama_domain"
                                class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Nama
                                Domain</label>
                            <input type="text" name="nama_domain" id="nama_domain"
                                class=" bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $domain->nama_domain }}" required>
                        </div>
                        <div id="dynamicItem" class="col-span-2 border-gray-500 border p-3 rounded-lg w-full">
                            <h5 class="w-full text-gray-700 text-xs mb-3"> *Cek kembali data yang anda input</h5>

                            <div class="flex gap-3">
                                <div class="w-full space-y-4 border rounded-lg p-3">
                                    <div class="dark:text-white text-black space-y-2">
                                        <label for="">Keterangan</label>
                                        <input type="text" name="item[0][name]" placeholder="Masukan Keterangan"
                                            class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="Perpanjang Website" required />
                                    </div>
                                    <div class="dark:text-white text-black space-y-2">
                                        <label for="">Tanggal Awal</label>
                                        <input type="date" name="item[0][periode_awal]"
                                            class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{ $domain->tanggal_expired }}" />
                                    </div>
                                    <div class="dark:text-white text-black space-y-2">
                                        <label for="">Tanggal Akhir</label>
                                        <input type="date" name="item[0][periode_akhir]"
                                            class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{ $expiredDate }}" />
                                    </div>
                                    <div class="dark:text-white text-black space-y-2">
                                        <label for="">Quantity</label>
                                        <input type="number" name="item[0][qty]" placeholder="Masukan Quantity"
                                            class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="1" required />
                                    </div>
                                    <div class="dark:text-white text-black space-y-2">
                                        <label for="">Harga</label>
                                        <input type="number" name="item[0][price]" placeholder="Masukan Harga"
                                            class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{ $domain->perpanjangan }}" required />
                                    </div>
                                </div>
                                <div class="flex justify-end mt-2">
                                    <div>
                                        <button type="button" name="add" id="add"
                                            class="col-span-1 dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5    text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit"
                        class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">
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

            $("#dynamicItem").append(
                '<div id="div" class="flex gap-3"><div class="mt-3 col-span-2 space-y-4 border rounded-lg p-3 w-full"> <div class="dark:text-white text-black space-y-3 "> <label for="">Keterangan</label><input required type="text" name="item[' +
                i +
                '][name]" placeholder="Masukan Keterangan" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></div><div class="dark:text-white text-black space-y-3"> <label for="">Tanggal Awal</label><input type="date" name="item[' +
                i +
                '][periode_awal]" placeholder="Masukan Keterangan" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></div><div class="dark:text-white text-black space-y-3"> <label for="">Tanggal Akhir</label><input type="date" name="item[' +
                i +
                '][periode_akhir]" placeholder="Masukan Keterangan" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></div><div class="dark:text-white text-black space-y-3"> <label for="">Quantity</label><input required type="number" name="item[' +
                i +
                '][qty]" placeholder="Masukan Quantity" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></div><div class="dark:text-white text-black space-y-3"> <label for="">Harga</label><input required type="number" name="item[' +
                i +
                '][price]" placeholder="Masukan Harga" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></div></div><div class="col-span-1 flex justify-end mt-3"><div><button type="button" class=" dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5  text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 remove-tr">-</button></div></div></div>'
            );
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('#div').remove();
        });
    </script>
