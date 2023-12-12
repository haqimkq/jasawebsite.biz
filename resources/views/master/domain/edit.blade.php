<x-app-layout title="Edit Domain">
    @php
        $domain->tanggal_mulai = \Carbon\Carbon::parse($domain->tanggal_mulai)->format('d-m-Y');
        $domain->tanggal_expired = \Carbon\Carbon::parse($domain->tanggal_expired)->format('d-m-Y');
    @endphp
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 sm:px-10 px-3 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Domain</h2>
            <form action="{{ route('domain.update', $domain->id) }}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="col-span-2 ">
                        <div class="w-full dark:border-white border-blue-900 border rounded-lg">
                            <div class="px-5 py-3 bg-blue-900 dark:bg-gray-700 rounded-t-lg">
                                <label for="keterangan_domain"
                                    class="block text-lg font-medium text-white self-center">Domain</label>

                            </div>
                            <div class="w-full p-5 grid gap-4 grid-cols-2 sm:gap-6">
                                <div class="col-span-2">
                                    <div class="flex justify-between">
                                        <label for="nama_domain"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Domain</label>
                                        <div class=" flex items-center gap-2">
                                            <input class="rounded-full" @if ($domain->onlyHosting == true) checked @endif
                                                name="onlyHosting" type="checkbox" id="onlyHosting">
                                            <label class="text-white text-sm" for="onlyHosting"> Hosting Only</label>
                                        </div>
                                    </div>
                                    <input type="text" value="{{ $domain->nama_domain }}" name="nama_domain"
                                        id="nama_domain"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Nama Domain" required="">
                                </div>
                                <div class="w-full">
                                    <label for="tanggal_mulai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Mulai</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-format="dd MM yyyy" type="text"
                                            value="{{ $domain->tanggal_mulai }}" name="tanggal_mulai"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date" required>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="tanggal_mulai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Expired</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-format="dd MM yyyy" type="text"
                                            value="{{ $domain->tanggal_expired }}" name="tanggal_expired"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date"required>
                                    </div>
                                </div>
                                {{-- <div class="w-full">
                                    <label for="tanggal_mulai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Mulai</label>
                                    <input type="date" value="{{ $domain->tanggal_mulai }}" name="tanggal_mulai"
                                        id="tanggal_mulai"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <div class="w-full">
                                    <label for="tanggal_expired"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Expired</label>
                                    <input type="date" value="{{ $domain->tanggal_expired }}" name="tanggal_expired"
                                        id="tanggal_expired"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div> --}}
                                <div class="col-span-2">
                                    <div class="flex">
                                        <div class="flex-auto w-full">
                                            <label for="epp_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EPP
                                                Code</label>
                                            <input type="text" value="{{ $domain->epp_code }}" name="epp_code"
                                                id="epp_code"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Masukan EPP Code">
                                        </div>
                                        <div class="ml-3 flex-none">
                                            <label for="epp_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tampilkan
                                                EPP</label>
                                            <select name="hidden_epp"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="{{ $domain->hidden_epp }}" disabled selected></option>
                                                <option value="hidden">Hide</option>
                                                <option value="sh">Show</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="pelanggan_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pelanggan</label>
                                    <div class="w-full">
                                        <select
                                            class="js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            style="width: 100%" name="pelanggan_id">
                                            @if (isset($domain->pelanggan))
                                                <option selected value="{{ $domain->pelanggan->id }}">
                                                    {{ $domain->pelanggan->nama_pelanggan }}</option>
                                            @else
                                                <option value="" disabled selected>Pilih Pelanggan</option>
                                            @endif
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_pelanggan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="nameserver_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nameserver</label>
                                    <div class="flex gap-2">
                                        <select id="nameserver_id" name="nameserver_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            @if ($domain->nameserver)
                                                <option value="{{ $domain->nameserver->id }}" selected>
                                                    {{ $domain->nameserver->nameserver1 }} -
                                                    {{ $domain->nameserver->nameserver2 }}
                                                </option>
                                            @else
                                                <option disabled selected>Pilih Nameserver</option>
                                            @endif
                                            @foreach ($ns as $nameserver)
                                                <option value="{{ $nameserver->id }}">{{ $nameserver->nameserver1 }}
                                                    - {{ $nameserver->nameserver2 }}</option>
                                            @endforeach
                                        </select>

                                        <button type="button" data-modal-target="nameserverModal"
                                            data-modal-toggle="nameserverModal"
                                            class="px-3 dark:bg-gray-700 bg-blue-900 rounded-lg border-gray-300 text-white">+</button>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="perpanjangan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                        Perpanjangan</label>
                                    <input type="number" value="{{ $domain->perpanjangan }}" name="perpanjangan"
                                        id="perpanjangan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Lokasi Domain">
                                </div>
                                <div class="w-full">
                                    <label for="vendor"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vendor</label>
                                    <div class="relative">
                                        <input type="text" name="vendor" id="vendor"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Masukan Vendor" value="{{ $domain->vendor }}">
                                        <ul class="list w-full rounded-lg bg-white overflow-hidden absolute"></ul>
                                    </div>
                                </div>
                                <div class="col-span-2 ">
                                    <label for="keterangan_domain"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                    <textarea id="keterangan_domain" name="keterangan_domain" rows="8"
                                        class=" h-40 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ $domain->keterangan_domain }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 ">
                        <div class="w-full dark:border-white border-blue-900 border rounded-lg">
                            <div class="px-5 py-3 bg-blue-900 dark:bg-gray-700 rounded-t-lg">
                                <label for="keterangan_domain" class="block text-lg font-medium text-white">Informasi
                                    Login</label>
                            </div>
                            <div class="w-full p-5 rounded-lg space-y-5">
                                <div class="grid sm:grid-cols-5">
                                    <div class="flex justify-between sm:px-3 mb-2 sm:mb-0 items-center">
                                        <label for="loginUrl"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Url</label>
                                        <p class="sm:block hidden text-sm font-medium text-gray-900 dark:text-white">:
                                        </p>
                                    </div>
                                    <input type="text" value="{{ $domain->loginUrl }}" name="loginUrl"
                                        id="loginUrl"
                                        class=" col-span-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="grid sm:grid-cols-5">
                                    <div class="flex justify-between sm:px-3 mb-2 sm:mb-0 items-center">
                                        <label for="loginUsername"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                        <p class="sm:block hidden text-sm font-medium text-gray-900 dark:text-white">:
                                        </p>
                                    </div>
                                    <input type="text" value="{{ $domain->loginUsername }}" name="loginUsername"
                                        id="loginUsername"
                                        class=" col-span-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="grid sm:grid-cols-5">
                                    <div class="flex justify-between sm:px-3 mb-2 sm:mb-0 items-center">
                                        <label for="loginPassword"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <p class="sm:block hidden text-sm font-medium text-gray-900 dark:text-white">:
                                        </p>
                                    </div>
                                    <input type="text" value="{{ $domain->loginPassword }}" name="loginPassword"
                                        id="loginPassword"
                                        class=" col-span-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 ">
                        <div class="w-full border-blue-900 dark:border-white border rounded-lg">
                            <div class="px-5 py-3 bg-blue-900 dark:bg-gray-700 rounded-t-lg">
                                <label for="keterangan_domain"
                                    class="block text-lg font-medium text-white">Hosting</label>
                            </div>
                            <div class="w-full p-5 grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="hosting"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hosting</label>
                                    <input type="text" value="{{ $domain->hosting }}" name="hosting"
                                        id="hosting"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="kapasitas_hosting"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas
                                        hosting</label>
                                    <input type="number" value="{{ $domain->kapasitas_hosting }}"
                                        name="kapasitas_hosting" id="kapasitas_hosting"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="tanggal_hosting"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Hosting</label>
                                    <input type="date" value="{{ $domain->tanggal_hosting }}"
                                        name="tanggal_hosting" id="tanggal_hosting"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="lokasi_hosting"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                                        Hosting</label>
                                    <input type="text" value="{{ $domain->lokasi_hosting }}"
                                        name="lokasi_hosting" id="lokasi_hosting"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="paket_website"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket
                                        Website</label>
                                    <input type="text" value="{{ $domain->paket_website }}" name="paket_website"
                                        id="paket_website"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="jumlah_email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                        Email</label>
                                    <input type="number" value="{{ $domain->jumlah_email }}" name="jumlah_email"
                                        id="jumlah_email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit"
                    class="  dark:bg-gray-600 bg-blue-900 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
            </form>
        </div>
    </section>
    @include('components.modal.addNameserverModal')
    @include('components.modal.addLabelDomain')
</x-app-layout>
<script>
    let names = {!! json_encode($vendorDomains) !!};
    let sortedNames = names.sort();

    //reference
    let input = document.getElementById("vendor");

    input.addEventListener("keyup", (e) => {
        //loop through above array
        //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
        removeElements();
        for (let i of sortedNames) {
            //convert input to lowercase and compare with each string

            if (
                i.toLowerCase().startsWith(input.value.toLowerCase()) &&
                input.value != ""
            ) {
                let listItem = document.createElement("li");
                listItem.classList.add("list-items");
                listItem.style.cursor = "pointer";
                listItem.setAttribute("onclick", "displayNames('" + i + "')");
                let word = "<b>" + i.substr(0, input.value.length) + "</b>";
                word += i.substr(input.value.length);
                listItem.innerHTML = word;
                document.querySelector(".list").appendChild(listItem);
            }
        }
    });

    function displayNames(value) {
        input.value = value;
        removeElements();
    }

    function removeElements() {
        let items = document.querySelectorAll(".list-items");
        items.forEach((item) => {
            item.remove();
        });
    }
</script>
