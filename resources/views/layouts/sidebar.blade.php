<div class="h-screen items-center self-center align-middle fixed z-40 flex">
    <button type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
        aria-controls="drawer-navigation" class="dark:bg-gray-950 bg-orange-500 p-3 text-white rounded-r-full
        "><i
            class="fa-solid fa-arrow-right text-white"></i>
    </button>
</div>

<!-- drawer component -->
<div id="drawer-navigation"
    class="fixed top-0 left-0 z-50 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-blue-900 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold uppercase text-white dark:text-gray-400">
        Admin
    </h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-orange-500 hover:text-white rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-black dark:hover:text-white">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white dark:fill-gray-400 fill-orange-500"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3 group-hover:text-black">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-100 dark:hover:text-white hover:text-black dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-homepage" data-collapse-toggle="dropdown-homepage">
                    <div class="w-6 h-6">
                        <i class="fa-solid fa-lg fa-house text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Home Page</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-homepage" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('portofolio.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Portofolio
                            Image</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-100 dark:hover:text-white hover:text-black dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <div class="w-6 h-6">
                        <i class="fa-solid fa-lg fa-database text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Database</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('domain.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Domain</a>
                    </li>
                    <li>
                        <a href="{{ route('pelanggan.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Pelanggan</a>
                    </li>
                    <li>
                        <a href="{{ route('nameserver.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Nameserver</a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">User</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-100 dark:hover:text-white hover:text-black dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-label" data-collapse-toggle="dropdown-label">
                    <div class="w-6 h-6">
                        <i class="fa-solid fa-lg fa-tags text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Label</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-label" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('labelDomain.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Label
                            Domain</a>
                    </li>
                    <li>
                        <a href="{{ route('label.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Label
                            Pelanggan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('daftartemplate.index') }}"
                    class="flex items-center p-2 text-white dark:hover:text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white fill-orange-500 dark:fill-gray-400"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Template Website</span>

                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-100 dark:hover:text-white hover:text-black dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-invoice" data-collapse-toggle="dropdown-invoice">
                    <div class="w-6 h-6">
                        <i class="fa-solid fa-lg fa-file-pdf text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Invoice</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-invoice" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('inv.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Daftar
                            Invoice</a>
                    </li>
                    <li>
                        <a href="{{ route('invoice') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Buat
                            Invoice</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-100 dark:hover:text-white hover:text-black dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-article" data-collapse-toggle="dropdown-article">
                    <div class="w-6 h-6">
                        <i class="fa-solid fa-lg fa-newspaper text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Article</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-article" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('articles.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Article</a>
                    </li>
                    <li>
                        <a href="{{ route('articles.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Generator</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('whatsapp.index') }}"
                    class="flex items-center p-2 text-white dark:hover:text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="w-6 h-6">
                        <i class="fa-solid fa-lg fa-phone text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 whitespace-nowrap">Nomor Whatsapp</span>

                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-100 dark:hover:text-white hover:text-black dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-compare" data-collapse-toggle="dropdown-compare">
                    <div class="w-6 h-6">
                        <i class="fa-solid fa-lg fa-code-compare text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Compare</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-compare" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('compare.index') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Compare
                            Database</a>
                    </li>
                    <li>
                        <a href="{{ route('compare.filter') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">Sub
                            Domain Filter</a>
                    </li>
                    <li>
                        <a href="{{ route('compare.check') }}"
                            class="flex items-center w-full p-2 dark:text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-gray-300 dark:hover:bg-gray-700">
                            Check Domain</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('whatsappGateway.index') }}"
                    class="flex items-center p-2 text-white dark:hover:text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="w-6 h-6">
                        <i class="fa-brands fa-lg fa-whatsapp text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 whitespace-nowrap">Whatsapp Gateway</span>

                </a>
            </li>
            <li>
                <a href="{{ route('youtube.index') }}"
                    class="flex items-center p-2 text-white dark:hover:text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="w-6 h-6">
                        <i class="fa-brands fa-lg fa-youtube text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 whitespace-nowrap">Youtube</span>

                </a>
            </li>
            <li>
                <a href="{{ route('notepad.index') }}"
                    class="flex items-center p-2 text-white dark:hover:text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="w-6 h-6">
                        <i class="fa-regular fa-lg fa-clipboard text-orange-500 dark:text-gray-400"></i>
                    </div>
                    <span class="flex-1 ml-3 whitespace-nowrap">Notepad</span>

                </a>
            </li>
        </ul>
    </div>
</div>
