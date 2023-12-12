<div id="totalPelanggan" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between sm:p-4 p-1 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="sm:text-xl text-lg font-semibold text-gray-900 dark:text-white leading-none">
                        Total Pelanggan
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="totalPelanggan">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="sm:mx-10 mx-2 py-5">
                <div class="sm:grid sm:grid-cols-2 sm:gap-5 gap-2 space-y-2 sm:space-y-0">
                    <button class="w-full flex">
                        <a href="{{ route('pelanggan.index') }}"
                            class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full flex">
                            <div
                                class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class="fa-solid text-white fa-person fa-lg"></i>
                                    </div>
                                </div>
                                <div class="pl-4 w-full">
                                    <div>
                                        <h2 class="text-white text-lg text-center font-extrabold">
                                            {{ $totalPelanggan }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            Semua Pelanggan
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                    <button type="button" data-modal-target="pelangganActive" data-modal-toggle="pelangganActive"
                        data-modal-hide="totalPelanggan"
                        class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full flex">
                        <div
                            class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                            <div>
                                <div
                                    class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                    <i class="fa-solid text-white fa-check"></i>
                                </div>
                            </div>
                            <div class="pl-4 w-full">
                                <div>
                                    <h2 class="text-white text-lg text-center font-extrabold">
                                        {{ $pelangganActiveCount }}
                                    </h2>
                                    <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                        Pelanggan Aktif
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </button>
                    <button type="button" data-modal-target="pelangganNotActive" data-modal-toggle="pelangganNotActive"
                        data-modal-hide="totalPelanggan"
                        class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full flex">
                        <div
                            class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                            <div>
                                <div
                                    class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                    <i class="fa-solid text-white fa-x"></i>
                                </div>
                            </div>
                            <div class="pl-4 w-full">
                                <div>
                                    <h2 class="text-white text-lg text-center font-extrabold">
                                        {{ $pelangganNotActiveCount }}
                                    </h2>
                                    <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                        Pelanggan Nonaktif
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </button>
                    <button type="button"
                        class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full ">
                        <a href="{{ route('pelanggan.index', ['prospekFilter' => 1]) }}" class="flex">
                            <div
                                class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class="fa-solid text-white fa-person fa-lg"></i>
                                    </div>
                                </div>
                                <div class="pl-4 w-full">
                                    <div>
                                        <h2 class="text-white text-lg text-center font-extrabold">
                                            {{ $pelanggans->where('status', 'prospek')->count() }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            Prospek
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                    <button type="button"
                        class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full">
                        <a href="{{ route('pelanggan.index', ['hotProspekFilter' => 1]) }}" class="flex">
                            <div
                                class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class="fa-solid text-white fa-person fa-lg"></i>
                                    </div>
                                </div>
                                <div class="pl-4 w-full">
                                    <div>
                                        <h2 class="text-white text-lg text-center font-extrabold">
                                            {{ $pelanggans->where('status', 'hotProspek')->count() }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            Hot Prospek
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.modal.pelangganActive')
@include('components.modal.pelangganNotActive')
