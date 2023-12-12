<x-app-layout>
    <section class="bg-white dark:bg-gray-900 py-3 mx-3 ">
        <div
            class="pb-3 mx-auto mt-5 rounded-xl max-w-2xl lg:pb-6 dark:bg-gray-900 border border-black dark:border-white">
            <div class="grid gap-2 sm:grid-cols-2 sm:gap-2">
                <div
                    class=" sm:px-3 sm:py-2 p-3 items-center justify-between flex col-span-2 font-medium text-left text-gray-500 rounded-t-xl bg-blue-900 dark:bg-gray-700">
                    <div class="col-span-1">
                        @if (isset($domains->pelanggan))
                            <a href="{{ route('pelanggan.show', $domains->pelanggan->id) }}">
                                <p class="text-white font-black font-sans tracking-widest text-md sm:text-xl flex-auto">
                                    {{ $domains->pelanggan->nama_pelanggan }}</p>
                            </a>
                        @endif
                    </div>
                    <div class="flex justify-end self-center col-span-1 text-sm sm:text-base">
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
                </div>
            </div>

            <div class="sm:grid gap-2 sm:grid-cols-2 sm:gap-2 sm:px-4 px-2 mt-5 space-y-2">
                <div
                    class="dark:bg-gray-600 col-span-2 border bg-blue-900 dark:border-gray-400 border-blue-900 rounded-lg">
                    <p class="text-white ml-1 p-2 text-center">Informasi Domain</p>
                    <div
                        class="grid gap-4 sm:grid-cols-2 sm:gap-2 p-5 dark:bg-gray-900 bg-white rounded-lg rounded-t-none">
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class="sm:text-sm text-xs font-medium text-gray-900 dark:text-white self-center ">
                                    Nama
                                    Domain</p>
                                <p>:</p>
                            </div>
                            <p
                                class="text-black dark:text-gray-200 col-span-3 break-all sm:text-sm text-xs self-center">
                                {{ $domains->nama_domain }}</p>
                        </div>
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                    Tanggal Mulai</p>
                                <p>:</p>
                            </div>
                            <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                {{ date('j \\ F Y', strtotime($domains->tanggal_mulai)) }}
                            </p>
                        </div>
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                    Tanggal Expired
                                </p>
                                <p>:</p>
                            </div>
                            <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                {{ date('j \\ F Y', strtotime($domains->tanggal_expired)) }}
                            </p>
                        </div>
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Nameserver</p>
                                <p>:</p>
                            </div>
                            <div>
                                <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                    @if ($domains->nameserver)
                                        {{ $domains->nameserver->nameserver1 }}
                                    @endif
                                </p>
                                <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                    @if ($domains->nameserver)
                                        {{ $domains->nameserver->nameserver2 }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        @if (Auth::user() && Auth::user()->isAdmin == true)
                            <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                                <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                    <p
                                        class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                        Epp Code</p>
                                    <p>:</p>
                                </div>
                                <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                    {{ $domains->epp_code }}</p>
                            </div>
                        @else
                            <div class="{{ $domains->hidden_epp }} grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                                <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                    <p
                                        class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                        Epp Code</p>
                                    <p>:</p>
                                </div>
                                <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                    {{ $domains->epp_code }}</p>
                            </div>
                        @endif
                        @if (Auth::user() && Auth::user()->isAdmin == true)
                            <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                                <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                    <p
                                        class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                        Harga Perpanjangan
                                    </p>
                                    <p>:</p>
                                </div>
                                <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                    Rp. {{ number_format($domains->perpanjangan) }}</p>
                            </div>
                        @else
                        @endif
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                    Paket
                                    Website</p>
                                <p>:</p>
                            </div>
                            <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                {{ $domains->paket_website }}</p>
                        </div>
                        @if (Auth::user() && Auth::user()->isAdmin == true)
                            <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                                <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                    <p
                                        class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                        Jumlah Email
                                    </p>
                                    <p>:</p>
                                </div>
                                <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                    {{ $domains->jumlah_email }}</p>
                            </div>
                            <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2 ">
                                <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                    <p
                                        class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                        Vendor
                                    </p>
                                    <p>:</p>
                                </div>
                                <p class="text-black dark:text-gray-200 col-span-3 text-xs sm:text-sm self-center">
                                    {{ $domains->vendor }}</p>
                            </div>
                        @else
                        @endif
                        <div class="sm:grid sm:grid-cols-4 grid-cols-5 col-span-2">
                            <div
                                class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white mb-2 sm:mb-0">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white ">Keterangan</p>
                                <p class="sm:block hidden">:</p>
                            </div>
                            <textarea disabled id="keterangan_domain" name="keterangan_domain" rows="8"
                                class="h-40 block p-2.5 w-full text-xs sm:text-sm bg-gray-50 text-black dark:text-gray-200 col-span-3 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600  dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ $domains->keterangan_domain }}</textarea>
                        </div>
                    </div>
                </div>
                <div
                    class="dark:bg-gray-600 col-span-2 border bg-blue-900 dark:border-gray-400 border-blue-900 rounded-lg">
                    <p class="text-white ml-1 p-2 text-center">Informasi Hosting</p>
                    <div
                        class="grid gap-4 sm:grid-cols-2 sm:gap-2 p-5 dark:bg-gray-900 bg-white rounded-lg rounded-t-none">
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                    Hosting</p>
                                <p>:</p>
                            </div>
                            <p class="text-black dark:text-gray-200 col-span-3">{{ $domains->hosting }}</p>
                        </div>
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                    Lokasi
                                    Hosting
                                </p>
                                <p>:</p>
                            </div>
                            <p class="text-black dark:text-gray-200 col-span-3">{{ $domains->lokasi_hosting }}</p>
                        </div>
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                    Kapasitas Hosting
                                </p>
                                <p>:</p>
                            </div>
                            <p class="text-black dark:text-gray-200 col-span-3">{{ $domains->kapasitas_hosting }}</p>
                        </div>
                        <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2">
                            <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                <p class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                    Tanggal Hosting
                                </p>
                                <p>:</p>
                            </div>
                            <p class="text-black dark:text-gray-200 col-span-3">
                                {{ $domains->tanggal_hosting }}
                            </p>
                        </div>
                    </div>
                </div>
                @if (Auth::user() && Auth::user()->isAdmin == true)
                    <div
                        class="dark:bg-gray-600 col-span-2 border bg-blue-900 dark:border-gray-400 border-blue-900 rounded-lg">
                        <p class="text-white ml-1 p-2 text-center">Informasi Login</p>
                        <div
                            class="grid gap-4 sm:grid-cols-2 sm:gap-2 p-5 dark:bg-gray-900 bg-white rounded-lg rounded-t-none">
                            <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2">
                                <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                    <p
                                        class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                        Url</p>
                                    <p>:</p>
                                </div>
                                <p class="text-black dark:text-gray-200 col-span-3">{{ $domains->loginUrl }}</p>
                            </div>
                            <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2">
                                <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                    <p
                                        class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                        Username
                                    </p>
                                    <p>:</p>
                                </div>
                                <p class="text-black dark:text-gray-200 col-span-3">{{ $domains->loginUsername }}</p>
                            </div>
                            <div class="grid sm:grid-cols-4 grid-cols-5 col-span-2">
                                <div class="flex justify-between pr-2 sm:col-span-1 col-span-2 w-full text-white">
                                    <p
                                        class=" text-xs sm:text-sm font-medium text-gray-900 dark:text-white self-center ">
                                        Password
                                    </p>
                                    <p>:</p>
                                </div>
                                <p class="text-black dark:text-gray-200 col-span-3">{{ $domains->loginPassword }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="flex justify-center col-span-2 gap-3">
                    <button onclick="history.back()"
                        class=" dark:bg-gray-600 bg-blue-900 dark:hover:bg-gray-800 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-indigo-700 items-center px-5 py-2.5 mt-4 sm:mt-6 text-xs font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 w-32">
                        Kembali
                    </button>
                    @if (Auth::user() && Auth::user()->isAdmin == true)
                        <a href="{{ route('domain.edit', $domains->id) }}"
                            class=" dark:bg-gray-600 bg-blue-900 dark:hover:bg-gray-800 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-indigo-700 items-center px-5 py-2.5 mt-4 sm:mt-6 text-xs font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 w-32 align-middle flex justify-center">
                            <p>
                                Edit
                            </p>
                        </a>
                        <a href="{{ route('domainInvoice', ['domain' => $domains->id]) }}"
                            class=" dark:bg-gray-600 bg-blue-900 dark:hover:bg-gray-800 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-indigo-700 items-center px-5 py-2.5 mt-4 sm:mt-6 text-xs font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 w-32">
                            Buat Invoice
                        </a>
                    @endif
                </div>
            </div>
            </form>
        </div>
    </section>

</x-app-layout>
