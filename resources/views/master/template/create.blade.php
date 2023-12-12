<x-app-layout title="Tambah Template">

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Template Baru</h2>
            <form action="{{ route('daftartemplate.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-center">
                    <div class="relative">
                        <img id="fotoProfil" class="object-cover w-40 h-40"
                            src="{{ asset('storage/images/template/default.png') }}" alt="">
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

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="col-span-2">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Template</label>
                        <input type="text" name="nama_template" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nama Template" required="">
                    </div>
                    <div class="col-span-2">
                        <div class="mb-2 flex justify-between">
                            <label for=""
                                class="block leading-none text-sm font-medium text-gray-900 dark:text-white">Link
                                Live Preview </label>
                            <span class="text-xs text-gray-500 leading-none">*Gunakan Https://</span>
                        </div>
                        <input type="url" name="link" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan URL Website" required="">
                    </div>
                    <div class="col-span-2">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                        <input type="number" name="harga" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Harga Website" required="">
                    </div>
                </div>
                <button type="submit"
                    class="  dark:bg-gray-600 bg-blue-900 text-white p-3 rounded shadow-sm focus:outline-none hover:to-blue-800 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
            </form>
        </div>
    </section>

</x-app-layout>
