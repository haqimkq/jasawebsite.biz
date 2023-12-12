@props(['id' => null, 'image' => '', 'link' => '', 'nama_template' => ''])

<div id="showTemplate-{{ $id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white"> Template
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="showTemplate-{{ $id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="md:grid grid-cols-2 sm:p-10 p-4">
                <div class="sm:w-[90%] my-3 md:my-0">
                    <img src="{{ asset('storage/images/template') }}/{{ $image }}" alt="">
                </div>
                <div>
                    <div class="md:w-[90%]">
                        <div class="md:text-[30px] dark:text-white font-[700] leading-none">
                            Paket Pembuatan Website Instan Template <span>{{ $nama_template }}</span> Murah - Siap Pakai
                            & Terima Beres
                        </div>
                        <div class="my-5">
                            <button
                                class="px-3 py-2 shadow-sm shadow-slate-400 bg-blue-700 dark:bg-white rounded-lg w-full md:w-min whitespace-nowrap text-white dark:text-black">
                                <a href="{{ $link }}"><i class="fa-solid fa-link text-xs md:text-base"></i>
                                    Lihat Demo</a>
                            </button>
                        </div>

                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center sm:justify-start justify-center"
                                id="myTab{{ $id }}" data-tabs-toggle="#myTabContent{{ $id }}"
                                role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block sm:p-4 p-0 sm:text-base text-sm border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="dashboard-tab{{ $id }}"
                                        data-tabs-target="#dashboard{{ $id }}" type="button" role="tab"
                                        aria-controls="dashboard{{ $id }}" aria-selected="false">Paket Edit
                                        Mandiri</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block sm:p-4 p-0 sm:text-base text-sm border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-tab{{ $id }}"
                                        data-tabs-target="#settings{{ $id }}" type="button" role="tab"
                                        aria-controls="settings{{ $id }}" aria-selected="false">Paket Terima
                                        Beres</button>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div id="myTabContent{{ $id }}">
                        <div class="hidden p-4 rounded-lg bg-gray-100 dark:bg-gray-800"
                            id="dashboard{{ $id }}" role="tabpanel"
                            aria-labelledby="dashboard-tab{{ $id }}">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Hanya dengan <span class="font-bold dark:text-gray-300 text-black">Rp. 350 ribu,</span>
                                Anda sudah bisa
                                memiliki
                                sebuah
                                website 1
                                Halaman dengan
                                domain <span class="font-bold dark:text-gray-300 text-black">.web.id</span>. Atau, jika
                                ingin
                                menggunakan
                                domain <span class="font-bold dark:text-gray-300 text-black">.com</span>, Anda
                                hanya perlu
                                menambahkan
                                <span class="font-bold dark:text-gray-300 text-black">Rp. 65 ribu</span> saja.
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 my-5">
                                Jangan khawatir, kami akan membantu Anda untuk menginstall website tersebut, dan
                                setelah
                                itu, Anda bisa mengeditnya sendiri dengan mudah. Kami juga menyediakan video
                                tutorial
                                yang sederhana dan cocok untuk pemula, sehingga Anda bisa mengelola website dengan
                                lebih
                                mudah.
                            </p>
                            <div>
                                <a class="font-extrabold"
                                    href="https://api.whatsapp.com/send?phone=6289652236201&text=Saya%20Ingin%20Membuat%20Website%20Menggunakan%20Template%20{{ $nama_template }}%20dengan%20Paket%20Mandiri">
                                    <button
                                        class="p-3 bg-blue-700 dark:bg-white rounded-lg text-sm flex items-center gap-2 dark:hover:bg-gray-900 hover:bg-white hover:text-blue-700 text-white dark:hover:text-white w-full sm:w-min whitespace-nowrap justify-center ">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        Pilih Paket
                                    </button>
                                </a>

                            </div>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings{{ $id }}"
                            role="tabpanel" aria-labelledby="settings-tab{{ $id }}">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Hanya dengan <span class="font-bold dark:text-gray-300 text-black">Rp 499 ribu</span>
                                saja, Anda sudah
                                bisa memiliki website dengan
                                domain <span class="font-bold dark:text-gray-300 text-black">web.id</span> .
                                Atau, jika Anda ingin domain <span
                                    class="font-bold dark:text-gray-300 text-black">.com</span>, Anda
                                tinggal menambahkan <span class="font-bold dark:text-gray-300 text-black">Rp 65
                                    ribu</span> saja. Kami siap
                                mengerjakan semuanya untuk Anda (Terima Beres).
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 my-5">
                                Jadi, tunggu apa lagi? Segera dapatkan
                                website impian Anda dengan pilihan domain yang sesuai keinginan!
                            </p>
                            <div>

                                <a class="font-extrabold"
                                    href="https://api.whatsapp.com/send?phone=6289652236201&text=Saya%20Ingin%20Membuat%20Website%20Menggunakan%20Template%20{{ $nama_template }}%20dengan%20Paket%20Terima%20Beres">
                                    <button
                                        class="p-3 bg-blue-700 dark:bg-white rounded-lg text-sm flex items-center gap-2 dark:hover:bg-gray-900 hover:bg-white hover:text-blue-700 text-white dark:hover:text-white w-full sm:w-min whitespace-nowrap justify-center ">
                                        <i class="fa-solid fa-cart-shopping"></i>Pilih Paket
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
