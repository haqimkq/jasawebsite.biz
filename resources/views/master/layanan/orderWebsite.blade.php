<x-app-layout>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    <div class="py-10 space-y-2">
        <p class="px-10 text-white text-3xl">Order Website</p>
        <div class="flex px-10 gap-5">
            @csrf
            @method('POST')
            <div class="w-2/3">
                <div class="bg-gray-800 p-5 rounded-lg border border-white">
                    <div class="space-y-5 divide-y divide-gray-700">
                        <div class="space-y-2">
                            <p class="text-white">
                                Pilih Nama Domain
                            </p>
                            <div class="w-full flex gap-3">
                                <input type="text" id="lookup"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    name="domain" placeholder="Cek Nama Domain Yang Anda Inginkan" required>
                                <div
                                    class="w-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <div id="loading" class="relative w-12 h-full" style="display: none">
                                        <div class="loadingContainer">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div id="success" class=" w-12 h-full" style="display: none">
                                        <div
                                            class="flex items-center justify-center h-full text-green-500 hover:bg-white hover:text-green-500 rounded-lg transition duration-500">
                                            <div class="fa fa-check">

                                            </div>
                                        </div>
                                    </div>
                                    <div id="check" class=" w-12 h-full">
                                        <div
                                            class="flex items-center justify-center h-full text-gray-300 hover:bg-white hover:text-gray-800 rounded-lg transition duration-500 ">
                                            <div class="fa fa-search">

                                            </div>
                                        </div>
                                    </div>
                                    <div id="failed" class=" w-12 h-full" style="display: none">
                                        <div class="flex items-center justify-center h-full text-red-500">
                                            <div class="fa fa-x">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-white">
                                Paket Website
                            </p>
                            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-3 ">
                                <div>
                                    <div class="checkbox-wrapper-16">
                                        <label class="checkbox-wrapper" for="1">
                                            <input class="checkbox-input" name="paket" id="1" value="899000"
                                                type="radio">
                                            <span class="checkbox-tile w-full">
                                                <div
                                                    class=" bg-white text-gray-900 font-extrabold  text-center rounded-xl space-y-3 py-3 drop-shadow-md w-full">
                                                    <div>
                                                        <p class=" font-extrabold text-xl">Simple</p>
                                                        <p class="text-sm">Rp. <span
                                                                class="text-2xl text-blue-900">899.000</span>
                                                        </p>
                                                    </div>

                                                    <div id="item-1" data-accordion="collapse">
                                                        <h2 id="item-1-heading-1">
                                                            <button type="button"
                                                                class="flex items-center justify-center w-full font-medium text-left text-gray-500 border-gray-200 dark:border-gray-700 dark:text-black bg-gray-200 dark:bg-white"
                                                                style="color: black"
                                                                data-accordion-target="#item-1-body-1"
                                                                aria-expanded="false" aria-controls="item-1-body-1">
                                                                <svg data-accordion-icon
                                                                    class="w-3 h-3 rotate-180 shrink-0"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 10 6">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5 5 1 1 5" />
                                                                </svg>
                                                            </button>
                                                        </h2>
                                                        <div id="item-1-body-1" class="hidden"
                                                            aria-labelledby="item-1-heading-1">
                                                            <div class="border-t border-gray-400 mx-5 pt-5">
                                                                <p class="text-start">Fitur Unggulan :</p>
                                                                <div>
                                                                    <table class="text-sm text-start ">
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Domain .com / .net</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Hosting 600MB</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>1 Halaman</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Free support jika
                                                                                terjadi error
                                                                                selama 1 tahun</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Template Exclusive</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="checkbox-wrapper-16">
                                        <label class="checkbox-wrapper" for="2">
                                            <input class="checkbox-input" name="paket" id="2" value="1000000"
                                                type="radio">
                                            <span class="checkbox-tile w-full">
                                                <div
                                                    class=" bg-white text-gray-900 font-extrabold  text-center rounded-xl space-y-3 py-3 drop-shadow-md w-full">
                                                    <div>
                                                        <p class=" font-extrabold text-xl">Medium</p>
                                                        <p class="text-sm">Rp. <span
                                                                class="text-2xl text-blue-900">1.000.000</span>
                                                        </p>
                                                    </div>
                                                    <div id="item-2" data-accordion="collapse">
                                                        <h2 id="item-2-heading-1">
                                                            <button type="button"
                                                                class="flex items-center justify-center w-full font-medium text-left text-gray-500 border-gray-200 dark:border-gray-700 dark:text-black bg-gray-200 dark:bg-white"
                                                                style="color: black"
                                                                data-accordion-target="#item-2-body-1"
                                                                aria-expanded="false" aria-controls="item-2-body-1">
                                                                <svg data-accordion-icon
                                                                    class="w-3 h-3 rotate-180 shrink-0"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 10 6">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5 5 1 1 5" />
                                                                </svg>
                                                            </button>
                                                        </h2>
                                                        <div id="item-2-body-1" class="hidden"
                                                            aria-labelledby="item-2-heading-1">
                                                            <div class="border-t border-gray-400 mx-5 pt-5">
                                                                <p class="text-start">Fitur Unggulan :</p>
                                                                <div>
                                                                    <table class="text-sm text-start ">
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Domain .com / .net</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Hosting 1Gb</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>1 Halaman</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Free support jika
                                                                                terjadi error
                                                                                selama 1 tahun</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Template Exclusive</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Bonus Video Profile Singkat</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="checkbox-wrapper-16">
                                        <label class="checkbox-wrapper" for="3">
                                            <input class="checkbox-input" name="paket" id="3"
                                                value="1299000" type="radio">
                                            <span class="checkbox-tile w-full">
                                                <div
                                                    class=" bg-white text-gray-900 font-extrabold  text-center rounded-xl space-y-3 py-3 drop-shadow-md w-full">
                                                    <div>
                                                        <p class=" font-extrabold text-xl">Business</p>
                                                        <p class="text-sm">Rp. <span
                                                                class="text-2xl text-blue-900">1.299.000</span>
                                                        </p>
                                                    </div>
                                                    <div id="item-3" data-accordion="collapse">
                                                        <h2 id="item-3-heading-1">
                                                            <button type="button"
                                                                class="flex items-center justify-center w-full font-medium text-left text-gray-500 border-gray-200 dark:border-gray-700 dark:text-black bg-gray-200 dark:bg-white"
                                                                style="color: black"
                                                                data-accordion-target="#item-3-body-1"
                                                                aria-expanded="false" aria-controls="item-3-body-1">
                                                                <svg data-accordion-icon
                                                                    class="w-3 h-3 rotate-180 shrink-0"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 10 6">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5 5 1 1 5" />
                                                                </svg>
                                                            </button>
                                                        </h2>
                                                        <div id="item-3-body-1" class="hidden"
                                                            aria-labelledby="item-3-heading-1">
                                                            <div class="border-t border-gray-400 mx-5 pt-5">
                                                                <p class="text-start">Fitur Unggulan :</p>
                                                                <div>
                                                                    <table class="text-sm text-start ">
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Domain .com / .net</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Hosting 5GB</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>5 Halaman</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Free support jika
                                                                                terjadi error
                                                                                selama 1 tahun</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Template Exclusive</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Bonus Video Profile Singkat</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>1 Akun Email Perusahaan</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="checkbox-wrapper-16">
                                        <label class="checkbox-wrapper" for="4">
                                            <input class="checkbox-input" name="paket" id="4"
                                                value="1599000" type="radio">
                                            <span class="checkbox-tile w-full">
                                                <div
                                                    class=" bg-white text-gray-900 font-extrabold  text-center rounded-xl space-y-3 py-3 drop-shadow-md w-full">
                                                    <div>
                                                        <p class=" font-extrabold text-xl">Business +</p>
                                                        <p class="text-sm">Rp. <span
                                                                class="text-2xl text-blue-900">1.599.000</span>
                                                        </p>
                                                    </div>
                                                    <div id="item-4" data-accordion="collapse">
                                                        <h2 id="item-4-heading-1">
                                                            <button type="button"
                                                                class="flex items-center justify-center w-full font-medium text-left text-gray-500 border-gray-200 dark:border-gray-700 dark:text-black bg-gray-200 dark:bg-white"
                                                                style="color: black"
                                                                data-accordion-target="#item-4-body-1"
                                                                aria-expanded="false" aria-controls="item-4-body-1">
                                                                <svg data-accordion-icon
                                                                    class="w-3 h-3 rotate-180 shrink-0"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 10 6">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5 5 1 1 5" />
                                                                </svg>
                                                            </button>
                                                        </h2>
                                                        <div id="item-4-body-1" class="hidden"
                                                            aria-labelledby="item-4-heading-1">
                                                            <div class="border-t border-gray-400 mx-5 pt-5">
                                                                <p class="text-start">Fitur Unggulan :</p>
                                                                <div>
                                                                    <table class="text-sm text-start ">
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Domain .com / .net</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Hosting 25GB</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>5 Halaman</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Free support jika
                                                                                terjadi error
                                                                                selama 1 tahun</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Template Exclusive</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Bonus Video Profile Singkat</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>1 Akun Email Perusahaan</td>
                                                                        </tr>
                                                                        <tr class="align-top ">
                                                                            <td class="px-2"><i
                                                                                    class="fa fa-check text-green-500 font-extrabold"></i>
                                                                            </td>
                                                                            <td>Bonus Google Ads 5 Hari</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-white">Pilih Template</p>
                            <div class="grid md:grid-cols-2 grid-flow-row gap-4 place-items-center">
                                @foreach ($template as $item)
                                    <div class="checkbox-wrapper-16">
                                        <label class="checkbox-wrapper" for="template-{{ $item->id }}">
                                            <input class="checkbox-input" type="radio" name="template"
                                                value="{{ $item->nama_template }}" id="template-{{ $item->id }}">
                                            <span class="checkbox-tile w-full">
                                                <div class="p-5 w-full">
                                                    <div class="card_swipe">
                                                        <img src="{{ asset('storage/images/template') }}/{{ $item->image }}"
                                                            alt="">
                                                        <div class="card_swipe__content">
                                                            <div class="flex items-center h-full justify-center">
                                                                <div class="w-full">
                                                                    <p class="card_swipe__title">
                                                                        {{ $item->nama_template }}
                                                                    </p>
                                                                    <div class="flex justify-center">
                                                                        <a class="py-1 w-full rounded-lg bg-gray-800 text-white text-center"
                                                                            target="_blank"
                                                                            href="{{ $item->link }}">
                                                                            Live Demo
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/3">
                <div class="bg-gray-800 rounded-lg border border-white">
                    <form action="{{ route('store.website') }}" method="POST">
                        @csrf
                        @method('POST')
                        <p class="p-3 bg-gray-700 rounded-t-lg text-white font-bold">Detail Transaksi</p>
                        <div class="p-3">
                            <table class="w-full text-white text-sm">
                                <tr>
                                    <td>Nama Domain</td>
                                    <td class="text-end"><input
                                            class="bg-transparent border-none p-0 text-white text-end"
                                            name="nama_domain" id="nama_domain" type="text" readonly></td>
                                </tr>
                                <tr>
                                    <td>Template</td>
                                    <td class="text-end"><input
                                            class="bg-transparent border-none p-0 text-white text-end"
                                            name="nama_template" id="detail-template" type="text" readonly></td>
                                </tr>
                                <tr>
                                    <td><input class="bg-transparent border-none p-0 text-white text-start text-sm"
                                            name="nama_paket" id="namaPaket" type="text" value="Paket" readonly>
                                    </td>
                                    <td class="text-end"><input
                                            class="bg-transparent border-none p-0 text-white text-end" id="hargaPaket"
                                            name="harga_paket" type="text" readonly></td>
                                </tr>
                                <tr>
                                    <td> PPN 11%</td>
                                    <td class="text-end"><input
                                            class="bg-transparent border-none p-0 text-white text-end" id="hargaPPN"
                                            name="harga_ppn" type="text" readonly></td>
                                </tr>
                                <tr>
                                    <td> Total</td>
                                    <td class="text-end"><input
                                            class="bg-transparent border-none p-0 text-white text-end" id="hargaTotal"
                                            name="harga_total" type="text" readonly></td>
                                </tr>
                            </table>
                        </div>
                        <div class="p-3">
                            <button type="submit"
                                class="bg-white rounded-lg w-full text-center font-extrabold py-2 text-sm">
                                <i class="fa fa-shopping-cart"></i> Check Out</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const selectedPaket = urlParams.get('paket');
    const selectedTemplate = urlParams.get('template');
    const radioButtonsPaket = document.querySelectorAll('input[name="paket"]');
    const radioButtonsTemplate = document.querySelectorAll('input[name="template"]');
    let hargaPPN = 0;
    let hargaPaket = 0;
    let hargaTotal = 0;

    if (selectedPaket !== null) {
        const radio = document.getElementById(`${selectedPaket}`);
        if (radio) {
            radio.checked = true;
            const paketValue = getPaketValue(radio.value);
            hargaPaket = parseInt(radio.value);
            hargaPPN = hargaPaket * 11 / 100;
            hargaTotal = hargaPPN + hargaPaket;
            displayDetailPaket(paketValue);
            displayDetailPPN(hargaPaket);
            displayDetailTotal(hargaTotal);
        }
    }
    if (selectedTemplate !== null) {
        const radio = document.getElementById(`${selectedTemplate}`);
        if (radio) {
            radio.checked = true;
            const templateValue = radio.value;
            displayDetailTemplate(templateValue);
        }
    }
    radioButtonsPaket.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                const paketValue = getPaketValue(this.value);
                hargaPaket = parseInt(radio.value);
                hargaPPN = hargaPaket * 11 / 100;
                hargaTotal = hargaPPN + hargaPaket;
                displayDetailPaket(paketValue);
                displayDetailPPN(hargaPaket);
                displayDetailTotal(hargaTotal);
            }
        });
    });
    radioButtonsTemplate.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                const templateValue = this.value;
                displayDetailTemplate(templateValue);
            }
        });
    });

    function getPaketValue(radioValue) {
        switch (radioValue) {
            case '899000':
                return 'Paket Simple: Rp. 899.000';
            case '1000000':
                return 'Paket Medium: Rp. 1.000.000';
            case '1299000':
                return 'Paket Business: Rp. 1.299.000';
            case '1599000':
                return 'Paket Business+: Rp. 1.599.000';
            default:
                return '';
        }
    }

    function displayDetailPaket(paketValue) {
        const namaPaketElement = document.getElementById('namaPaket');
        const hargaPaketElement = document.getElementById('hargaPaket');

        const [nama, harga] = paketValue.split(':');
        namaPaketElement.value = nama;
        hargaPaketElement.value = harga;
    }

    function displayDetailPPN(hargaPaket) {
        const table = document.getElementById('hargaPPN');
        const hargaPPN = formatCurrency(hargaPaket * 11 / 100);
        table.value = hargaPPN;

    }

    function displayDetailTemplate(templateValue) {
        const templateDetail = document.getElementById('detail-template');
        templateDetail.innerHTML = '';
        templateDetail.value = templateValue;
    }

    function displayDetailTotal(hargaTotal) {
        const total = document.getElementById('hargaTotal');
        total.value = formatCurrency(hargaTotal);
    }

    function formatCurrency(value) {
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
        const formattedValue = formatter.format(value);
        return formattedValue.replace(/[,.]00$/, '');
    }
</script>
<script>
    const check = document.getElementById('check');
    const namaDomain = document.getElementById('nama_domain');
    const inputDomain = document.querySelector('input[name="domain"]');
    const loading = document.getElementById('loading');
    const success = document.getElementById('success');
    const failed = document.getElementById('failed');
    const hasilPencarian = document.getElementById('hasil-pencarian');
    const inputDomainElement = document.getElementById('lookup');
    inputDomainElement.addEventListener('keydown', function(event) {
        const keyCode = event.keyCode || event.which;
        if (keyCode === 13) {
            event.preventDefault();
        }
    });

    check.addEventListener('click', function(e) {
        const inputDomainValue = inputDomainElement.value;
        loading.style.display = 'block';
        check.style.display = 'none';
        success.style.display = 'none';
        failed.style.display = 'none';
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const domainStatus = JSON.parse(xhr.responseText).status;
                    if (domainStatus === 0) {
                        inputDomainElement.value = '';
                        failed.style.display = 'block';
                    } else {
                        success.style.display = 'block';
                    }
                }
                loading.style.display = 'none';
            }
        };
        xhr.open('GET', `{{ route('lookup') }}?domain=${encodeURIComponent(inputDomainValue)}`, true);
        xhr.send();
    });

    inputDomain.addEventListener('change', function(event) {
        success.style.display = 'none';
        failed.style.display = 'none';
        check.style.display = 'block';
    });

    success.addEventListener('click', function(event) {
        namaDomain.value = inputDomainElement.value;
    })
</script>
