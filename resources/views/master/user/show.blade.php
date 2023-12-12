<x-app-layout>

    <section class="bg-white dark:bg-gray-900 pt-3 mx-3 ">
        <div class="pb-3 pt-2 px-4 mx-auto mt-5 rounded-xl max-w-2xl lg:pb-6 lg:pt-2 bg-gray-600">
            <div class="grid gap-2 sm:grid-cols-2 sm:gap-2">
                {{-- header --}}

                <div class="w-full">
                    <p class="text-white font-black font-sans text-2xl">{{ $domain->pelanggan->nama_pelanggan }}</p>
                    <div class="w-full text-white text-sm">
                        {{ date('j \\ F Y', strtotime($domain->tanggal_mulai)) }} -
                        {{ date('j \\ F Y', strtotime($domain->tanggal_expired)) }}
                    </div>
                </div>


                <div class="w-full flex justify-end">
                    @if ($today->gte($expirationDate))
                        <div class="flex gap-3 items-center mr-2">
                            <i class="fa-solid fa-circle-xmark fa-lg align-self-center" style="color: #ff0000;"></i>
                            <p class="text-white">Expired</p>
                        </div>
                    @else
                        <div class="flex gap-3 items-center p-3">
                            <i class="fa-solid fa-circle-check fa-lg" style="color: #00ff33;"></i>
                            <p class="text-white">Aktif </p>
                        </div>
                    @endif
                </div>
                <div class="flex items-center col-span-2">
                    <div class="border-t-2 border-b-2 h-2 border-gray-300 flex-grow"></div>
                    <div class="border-t-2 border-b-2 h-2 border-gray-300 flex-grow"></div>
                </div>


                <div class="grid grid-cols-4 col-span-2 mt-4">
                    <label for="jumlah_email" class="block text-sm font-medium text-gray-900 dark:text-white ">Nama
                        Domain</label>
                    <input disabled type="text" value="{{ $domain->nama_domain }}" name="jumlah_email"
                        id="jumlah_email"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <label for="nameserver_id"
                        class="block text-sm font-medium text-gray-900 dark:text-white">Nameserver</label>
                    <input disabled type="text" value="{{ $domain->nameserver->nameserver1 }}" name="nameserver_id"
                        id="nameserver_id"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <label for="nameserver_id" class="block text-sm font-medium text-gray-900 dark:text-white"></label>
                    <input disabled type="text" value="{{ $domain->nameserver->nameserver2 }}" name="nameserver_id"
                        id="nameserver_id"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div class="grid grid-cols-4 col-span-2 ">
                    <label for="epp_code" class="col-span-1 block text-sm font-medium text-gray-900 dark:text-white">EPP
                        Code</label>
                    <input disabled type="text" value="{{ $domain->epp_code }}" name="epp_code" id="epp_code"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Masukan EPP Code" required="">
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <label for="hosting"
                        class="block text-sm font-medium text-gray-900 dark:text-white">Hosting</label>
                    <input disabled type="text" value="{{ $domain->hosting }}" name="hosting" id="hosting"
                        class="bg-gray-50 border col-span-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <label for="kapasitas_hosting"
                        class="block text-sm font-medium text-gray-900 dark:text-white">Kapasitas hosting</label>
                    <input disabled type="text" value="{{ $domain->kapasitas_hosting }}" name="kapasitas_hosting"
                        id="kapasitas_hosting"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <label for="tanggal_hosting" class="block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Hosting</label>
                    <input disabled type="date" value="{{ $domain->tanggal_hosting }}" name="tanggal_hosting"
                        id="tanggal_hosting"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <label for="lokasi_hosting" class="block text-sm font-medium text-gray-900 dark:text-white">Lokasi
                        Hosting</label>
                    <input disabled type="text" value="{{ $domain->lokasi_hosting }}" name="lokasi_hosting"
                        id="lokasi_hosting"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <label for="paket_website" class="block text-sm font-medium text-gray-900 dark:text-white">Paket
                        Website</label>
                    <input disabled type="text" value="{{ $domain->paket_website }}" name="paket_website"
                        id="paket_website"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <label for="jumlah_email" class="block text-sm font-medium text-gray-900 dark:text-white">Jumlah
                        Email</label>
                    <input disabled type="text" value="{{ $domain->jumlah_email }}" name="jumlah_email"
                        id="jumlah_email"
                        class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>


                <div class="grid grid-cols-4 col-span-2">
                    <label for="keterangan_domain"
                        class="block text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <textarea disabled id="keterangan_domain" name="keterangan_domain" rows="8"
                        class=" col-span-3 h-40 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ $domain->keterangan_domain }}</textarea>
                </div>
            </div>
            <div class="grid grid-cols-4 col-span-2">
                <button onclick="history.back()"
                    class=" col-end-5 bg-gray-900 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-indigo-700inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Kembali
                </button>
            </div>
            </form>
        </div>
    </section>

</x-app-layout>
