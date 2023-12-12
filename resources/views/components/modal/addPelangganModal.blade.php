<div id="pelangganModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-2 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 border-white border">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Pelanggan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="pelangganModal">
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

                <form action="{{ route('pelanggan.store2') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    @if (count($errors) > 0)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            @foreach ($errors->all() as $error)
                                <li><span class="block sm:inline">{{ $error }}</span>
                                </li>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            @endforeach
                        </div>

                    @endif

                    <div class="flex justify-center">
                        <div class="relative">
                            <img id="fotoProfil" class="object-cover w-40 h-40"
                                src="{{ asset('storage/images/fotoProfil') }}/default_image.jpg" alt="">
                            <div class="absolute z-10 top-0  opacity-0 hover:opacity-100">
                                <label for="fotoProfilInput">
                                    <div class="w-40 h-40 bg-black opacity-60 flex items-center">
                                        <p class="text-center w-full"><i class="fa-solid fa-pen"
                                                style="color: #ffffff;"></i>
                                        </p>
                                    </div>
                                    <input accept="image/*" type="file" name="image" class="hidden"
                                        id="fotoProfilInput" />
                                </label>
                            </div>
                            <script>
                                fotoProfilInput.onchange = evt => {
                                    const [file] = fotoProfilInput.files
                                    if (file) {
                                        fotoProfil.src = URL.createObjectURL(file)
                                    }
                                }
                            </script>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-4">
                        <div class="col-span-2">
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pelanggan</label>
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Nama Pelanggan" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Alamat" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="no_hp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Hp</label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Nomor Handphone">
                        </div>
                        <div class="col-span-2 hidden">
                            <label for="link_history"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                            <input type="text" name="user_id" id="user_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="1" required="">
                        </div>
                    </div>
                    <button type="submit"
                        class="dark:bg-white bg-blue-900 dark:hover:bg-gray-200 dark:text-black text-white p-3 rounded shadow-sm focus:outline-none hover:bg-indigo-700 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center  focus:ring-4">
                        Simpan
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
