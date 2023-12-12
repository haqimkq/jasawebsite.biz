<x-app-layout title="Tambah Domain">

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <div class="flex justify-between">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Domain Baru</h2>
                <button id="refresh">
                    <i class="fa-solid fa-rotate dark:text-white text-black"></i>
                </button>
            </div>
            <form id="myForm" action="{{ route('domain.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="grid gap-2 grid-cols-2 sm:grid-cols-2 sm:gap-6">
                    <div class="col-span-2">
                        <label for="nama_domain"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Domain</label>
                        <input type="text" name="nama_domain" id="nama_domain"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nama Domain" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="pelanggan_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pelanggan</label>
                        <div class="flex gap-2">
                            <div class="flex-auto relative">
                                <input autocomplete="off"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    type="text" id="search-input" placeholder="Search">

                                <div class="dark:bg-gray-600 bg-blue-900 text-white text-sm z-10 absolute w-full rounded-lg mt-1"
                                    id="search-results">
                                </div>
                            </div>


                            <button type="button" data-modal-target="pelangganModal" data-modal-toggle="pelangganModal"
                                class="px-3 dark:bg-gray-700 bg-blue-900 rounded-lg border-gray-300 text-white">+</button>
                        </div>

                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="nameserver_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nameserver</label>
                        <div class="flex gap-2">
                            <select id="nameserver_id" name="nameserver_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                                <option disabled selected>Pilih Nameserver</option>
                                @foreach ($ns as $nameserver)
                                    <option value="{{ $nameserver->id }}">{{ $nameserver->nameserver1 }} -
                                        {{ $nameserver->nameserver2 }}</option>
                                @endforeach
                            </select>
                            <button type="button" data-modal-target="nameserverModal"
                                data-modal-toggle="nameserverModal"
                                class="px-3 dark:bg-gray-700 bg-blue-900 rounded-lg border-gray-300 text-white">+</button>
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="tanggal_mulai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggalMulai" onchange="setExpiredDate()"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required="" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="tanggal_expired"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Expired</label>
                        <input type="date" name="tanggal_expired" id="tanggalExpired"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required="">
                    </div>
                </div>
                <input class="hidden" type="text" name="pelanggan_id" id="hidden-input">
                <div id="accordion-collapse" data-accordion="collapse" class="col-span-2 mt-3">
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full font-medium text-left dark:text-gray-300 text-black border-b border-gray-400 focus:bg-transparent dark:focus:bg-transparent dark:focus:text-white focus:text-gray-700 dark:active:text-white active:text-gray-700 dark:bg-transparent bg-transparent"
                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                            aria-controls="accordion-collapse-body-1">
                            <span class="text-sm">Lainnya</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-1" class="hidden p-2 space-y-3 border rounded-lg mt-2"
                        aria-labelledby="accordion-collapse-heading-1">
                        <div class=" flex items-center gap-2">
                            <input class="rounded-full" name="statusDomain" type="radio" id="onlyHosting"
                                value="onlyHosting">
                            <label class="text-white" for="onlyHosting"> Hosting Only</label>
                        </div>
                        <div class=" flex items-center gap-2">
                            <input class="rounded-full" name="statusDomain" type="radio" id="externalDomain"
                                value="externalDomain">
                            <label class="text-white" for="externalDomain"> External Client</label>
                        </div>
                        <div class="border rounded-lg">
                            <div class="px-3 py-2 text-white bg-gray-700 rounded-t-lg">
                                Domain
                            </div>
                            <div class="p-3 space-y-1">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="epp_code"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EPP
                                        Code</label>
                                    <input type="text" name="epp_code" id="epp_code"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan EPP Code">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="perpanjangan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                        Perpanjangan</label>
                                    <input type="number" name="perpanjangan" id="perpanjangan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Biaya Perpanjangan" value="650000">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="vendor"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vendor</label>
                                    <div class="relative">
                                        <input type="text" name="vendor" id="vendor"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Masukan Vendor">
                                        <ul class="list w-full rounded-lg bg-white overflow-hidden absolute"></ul>
                                    </div>
                                </div>
                                <div class="col-span-2 ">
                                    <label for="keterangan_domain"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                    <textarea id="keterangan_domain" name="keterangan_domain" rows="8"
                                        class=" h-40 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded-lg">
                            <div class="px-3 py-2 text-white bg-gray-700 rounded-t-lg">
                                Informasi Login
                            </div>
                            <div class="p-3 space-y-1">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="loginUrl"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url
                                        Login</label>
                                    <input type="text" name="loginUrl" id="loginUrl"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Url Login">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="loginUsername"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" name="loginUsername" id="loginUsername"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Username">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="loginPassword"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="text" name="loginPassword" id="loginPassword"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Password">
                                </div>
                            </div>
                        </div>
                        <div class="border rounded-lg">
                            <div class="px-3 py-2 text-white bg-gray-700 rounded-t-lg">
                                Informasi Hosting
                            </div>
                            <div class="p-3 space-y-1">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="hosting"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hosting</label>
                                    <input type="text" name="hosting" id="hosting"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Hosting">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="kapasitas_hosting"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas
                                        Hosting</label>
                                    <input type="number" name="kapasitas_hosting" id="kapasitas_hosting"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Kapasitas Hosting">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="jumlah_email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                        Email</label>
                                    <input type="number" name="jumlah_email" id="jumlah_email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Jumlah Email">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="lokasi_hosting"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                                        Hosting</label>
                                    <input type="text" name="lokasi_hosting" id="lokasi_hosting"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Lokasi Hosting">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="paket_website"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket
                                        Website</label>
                                    <input type="text" name="paket_website" id="paket_website"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Paket Website">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="tanggal_hosting"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Hosting</label>
                                    <input type="date" name="tanggal_hosting" id="tanggal_hosting"
                                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit"
                    class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-blue-900 hover:bg-blue-700 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">
                    Tambah Domain
                </button>
            </form>
            @include('components.modal.addPelangganModal')
            @include('components.modal.addNameserverModal')
        </div>
    </section>
    <script>
        function setExpiredDate() {
            var tanggalMulai = document.getElementById("tanggalMulai").value;
            var tanggalExpired = document.getElementById("tanggalExpired");

            if (tanggalMulai) {
                var date = new Date(tanggalMulai);
                date.setDate(date.getDate() + 365);

                var formattedDate = date.toISOString().substring(0, 10);

                tanggalExpired.value = formattedDate;
                localStorage.setItem('Tanggal Expired', tanggalExpired.value);
            } else {
                tanggalExpired.value = "";
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            setExpiredDate(tanggalExpired);
        })
    </script>
    <script>
        $(document).ready(function() {
            var selectedId = null;

            $('#search-input').on('input', function() {
                var query = $(this).val();
                if (query.length >= 2) {
                    // Lakukan permintaan pencarian
                    $.ajax({
                        url: '{{ route('domain.searchPelanggan') }}',
                        data: {
                            query: query
                        },
                        success: function(response) {
                            var results = response;

                            $('#search-results').empty();
                            if (results.length > 0) {
                                $.each(results, function(index, result) {
                                    var title = result.domain[0] ? result.domain[0]
                                        .nama_domain : 'Belum Memiliki Domain';
                                    $('#search-results').append(
                                        '<p title="Nama Domain : ' + title +
                                        ' &#013; No Hp : ' + result.no_hp +
                                        '" class="search-item hover:bg-blue-800 dark:hover:bg-gray-500 px-3 py-1 rounded-lg" data-id="' +
                                        result.id + '">' + result.nama_pelanggan +
                                        '</p>'
                                    );
                                });
                            } else {
                                $('#search-input').data('no-match',
                                    true);
                            }
                        }
                    });
                } else {
                    $('#search-results').empty();
                }
            });

            $('#search-input').on('blur', function() {
                var noMatch = $(this).data('no-match');
                if (noMatch) {
                    $('#search-input').val('');
                    $('#hidden-input').val('');
                    $('#search-results').empty();
                }
                $(this).removeData('no-match'); // Menghapus data 'no-match'
            });

            $('#search-results').on('click', '.search-item', function() {
                selectedId = $(this).data('id');
                var selectedNama = $(this).text();
                $('#search-input').val(selectedNama);
                $('#hidden-input').val(selectedId);
                $('#search-results').empty();
            });
        });
    </script>
</x-app-layout>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const domain = urlParams.get('domain');
    const inputNamaDomain = document.getElementById('nama_domain');
    // const inputEppCode = document.getElementById('epp_code');
    const inputNameserver = document.getElementById('nameserver_id');
    const inputTanggalMulai = document.getElementById('tanggalMulai');
    const inputTanggalExpired = document.getElementById('tanggalExpired');
    const inputNamaPelanggan = document.getElementById('search-input');
    var savedDomain = localStorage.getItem('Nama Domain');
    // var savedEpp = localStorage.getItem('Epp Code');
    var savedNs = localStorage.getItem('Nameserver');
    var savedTm = localStorage.getItem('Tanggal Mulai');
    var savedTe = localStorage.getItem('Tanggal Expired');
    var savedNamaPelanggan = localStorage.getItem('Nama Pelanggan');
    const refresh = document.getElementById('refresh');


    if (domain !== null) {
        inputNamaDomain.value = domain;
    } else if (savedDomain) {
        inputNamaDomain.value = savedDomain;
    }
    // if (savedEpp) {
    //     inputEppCode.value = savedEpp;
    // }
    if (savedNs) {
        inputNameserver.value = savedNs;
    }
    if (savedTm) {
        inputTanggalMulai.value = savedTm;
    }
    if (savedTe) {
        inputTanggalExpired.value = savedTe;
    }
    if (savedNamaPelanggan) {
        inputNamaPelanggan.value = savedNamaPelanggan;
    }

    localStorage.setItem('Nama Domain', inputNamaDomain.value);
    inputNamaDomain.addEventListener('input', function() {
        localStorage.setItem('Nama Domain', inputNamaDomain.value);
    });
    inputNameserver.addEventListener('input', function() {
        localStorage.setItem('Nameserver', inputNameserver.value);
    });
    inputTanggalMulai.addEventListener('input', function() {
        localStorage.setItem('Tanggal Mulai', inputTanggalMulai.value);
    });
    inputTanggalExpired.addEventListener('input', function() {
        localStorage.setItem('Tanggal Expired', inputTanggalExpired.value);
    });
    inputNamaPelanggan.addEventListener('input', function() {
        localStorage.setItem('Nama Pelanggan', inputNamaPelanggan.value);
    });

    var myForm = document.getElementById('myForm');
    myForm.addEventListener('submit', function(event) {
        localStorage.removeItem('Nama Domain');
        localStorage.removeItem('Nameserver');
        localStorage.removeItem('Tanggal Mulai');
        localStorage.removeItem('Tanggal Expired');
        localStorage.removeItem('Nama Pelanggan');
    });

    refresh.addEventListener('click', function(event) {
        localStorage.removeItem('Nama Domain');
        localStorage.removeItem('Nameserver');
        localStorage.removeItem('Tanggal Expired');
        localStorage.removeItem('Tanggal Mulai');
        localStorage.removeItem('Nama Pelanggan');
        inputNamaDomain.value = "";
        inputNameserver.value = "";
        inputTanggalMulai.value = "";
        inputTanggalExpired.value = "";
        inputNamaPelanggan.value = "";
    });
</script>
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
