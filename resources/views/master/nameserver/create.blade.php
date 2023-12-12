<x-app-layout title="Tambah Nameserver">

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Nameserver Baru</h2>
            <form action="{{ route('nameserver.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-5 sm:gap-6">
                    <div class="sm:col-span-5">
                        <label for="nameserver1"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nameserver 1</label>
                        <input type="text" name="nameserver1" id="nameserver1"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nama Domain" required="">
                    </div>
                    <div class="sm:col-span-5">
                        <label for="nameserver2"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nameserver 2</label>
                        <input type="text" name="nameserver2" id="nameserver2"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nama Domain" required="">
                    </div>
                    <div class="sm:col-span-5">
                        <label for="tanggal_ns"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Nameserver</label>
                        <input type="date" name="tanggal_ns" id="tanggal_ns"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required="">
                    </div>

                    <div class="sm:col-span-5">
                        <label for="status_ns"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                            Nameserver</label>
                        <select id="status_ns" name="status_ns"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Status Nameserver</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class=" bg-blue-900 dark:bg-gray-600 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-500 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
            </form>
        </div>
    </section>



</x-app-layout>
