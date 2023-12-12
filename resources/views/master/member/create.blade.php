<x-app-layout>

    <div class="container-fluid h-screen flex justify-center">
        <div class="h-screen w-1/3 items-center justify-center self-center align-middle">
            <div class="py-8 mt-10 px-12 bg-gradient-to-b from-gray-800 rounded-xl  ">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Masukkan Data Diri Anda</h2>
                <form action="{{ route('member.store') }}" method="post">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="col-span-2">
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Nama Lengkap" required="">
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
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Hp</label>
                            <input type="number" name="no_hp" id="no_hp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Nomor Handphone" required="">
                        </div>

                        {{-- <div class="col-span-2 hidden">
                            <label for="link_history"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                                History</label>
                            <input type="text" name="link_history" id="link_history"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Link History" value="null" required="">
                        </div> --}}

                        <div class="hidden col-span-2">
                            <label for="user_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Userid</label>
                            <input type="text" name="user_id" id="user_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ Auth::user()->id }}" required="">
                        </div>


                        {{-- <div class="col-span-2 hidden">
                            <label for="keterangan_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea name="keterangan_pelanggan" id="keterangan_pelanggan" rows="8"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">null</textarea>
                        </div> --}}
                    </div>
                    <button type="submit"
                        class="  bg-indigo-500 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-indigo-700 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
