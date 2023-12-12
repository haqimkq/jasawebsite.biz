@php
    use Carbon\Carbon;
@endphp
<div id="totalDomain" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between sm:p-4 p-1 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="sm:text-xl text-lg font-semibold text-gray-900 dark:text-white leading-none">
                        Total Domain
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="totalDomain">
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
                <div class="grid grid-cols-2 sm:gap-5 gap-2 ">
                    <button class="w-full flex">
                        <a href="{{ route('domain.index') }}"
                            class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full flex">
                            <div
                                class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class="fa-solid text-white fa-globe"></i>
                                    </div>
                                </div>
                                <div class="pl-4 w-full">
                                    <div>
                                        <h2 class="text-white text-lg text-center font-extrabold">
                                            {{ $totalDomain }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            Semua Domain
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                    <button type="button" data-modal-target="activeDomain" data-modal-toggle="activeDomain"
                        data-modal-hide="totalDomain"
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
                                        {{ $activeCounts }}
                                    </h2>
                                    <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                        Domain Aktif
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </button>
                    <button type="button" data-modal-target="expiredSoon" data-modal-toggle="expiredSoon"
                        data-modal-hide="totalDomain"
                        class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full flex">
                        <div
                            class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                            <div>
                                <div
                                    class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                    <i class="fa-solid text-white fa-clock-rotate-left"></i>
                                </div>
                            </div>
                            <div class="pl-4 w-full">
                                <div>
                                    <h2 class="text-white text-lg text-center font-extrabold">
                                        {{ $countSoonExpired }}
                                    </h2>
                                    <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                        Expired Soon
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </button>
                    <button type="button" data-modal-target="expiredDomain" data-modal-toggle="expiredDomain"
                        data-modal-hide="totalDomain"
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


                                        {{ $expiredCount }}
                                    </h2>
                                    <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                        Domain Expired
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </button>
                    <button type="button" data-modal-target="expiredToday" data-modal-toggle="expiredToday"
                        data-modal-hide="totalDomain"
                        class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full flex">
                        <div
                            class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                            <div>
                                <div
                                    class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                    <i class="fa-solid text-white fa-calendar-week"></i>
                                </div>
                            </div>
                            <div class="pl-4 w-full">
                                <div>
                                    <h2 class="text-white text-lg text-center font-extrabold">

                                        @foreach ($domains as $item)
                                            @php
                                                $cvExp = Carbon::parse($item->tanggal_expired);
                                            @endphp
                                            @if ($cvExp == $todays)
                                                @php
                                                    $expiredToday++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        {{ $expiredToday }}
                                    </h2>
                                    <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                        Expired Today
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </button>

                    <button type="button" class="">
                        <a href="{{ route('domain.index', ['onlyHosting' => '1']) }}"
                            class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full flex">
                            <div
                                class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class=" w-5 fill-white">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 256 256" enable-background="new 0 0 256 256"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M188,80.8H68c-3.8,0-7,3.1-7,6.9v23.6c0,3.8,3.1,6.9,7,6.9h120c3.8,0,7-3.1,7-6.9V87.8C194.9,83.9,191.8,80.8,188,80.8z M73.6,97.3c-2.4,0-4.3-1.9-4.3-4.3c0-2.4,1.9-4.3,4.3-4.3s4.3,1.9,4.3,4.3S76,97.3,73.6,97.3z M176.6,109.7h-30.3V99.6h30.3V109.7L176.6,109.7z" />
                                                                <path
                                                                    d="M188,122.2H68c-3.8,0-7,3.1-7,7v23.6c0,3.8,3.1,6.9,7,6.9h120c3.8,0,7-3.1,7-6.9v-23.6C194.9,125.3,191.8,122.2,188,122.2z M73.6,138.7c-2.4,0-4.3-1.9-4.3-4.3c0-2.4,1.9-4.3,4.3-4.3s4.3,1.9,4.3,4.3C77.9,136.8,76,138.7,73.6,138.7z M176.6,151.1h-30.3V141h30.3V151.1L176.6,151.1z" />
                                                                <path
                                                                    d="M188,163.6H68c-3.8,0-7,3.1-7,6.9v23.6c0,3.8,3.1,7,7,7h120c3.8,0,7-3.1,7-7v-23.6C194.9,166.7,191.8,163.6,188,163.6z M73.6,180.1c-2.4,0-4.3-1.9-4.3-4.3s1.9-4.3,4.3-4.3s4.3,1.9,4.3,4.3S76,180.1,73.6,180.1z M176.6,192.4h-30.3v-10.1h30.3V192.4L176.6,192.4z" />
                                                                <path
                                                                    d="M148.7 223.8L135.9 223.8 135.9 205.2 120 205.2 120 223.8 107.3 223.8 107.3 228.7 62.5 228.7 62.5 244.5 107.3 244.5 107.3 249.4 148.7 249.4 148.7 244.5 193.5 244.5 193.5 228.7 148.7 228.7 z" />
                                                                <path
                                                                    d="M198.8,42.7c-1.7-0.1-3.3-1-4.3-2.4c-9.6-13-25-21-41.5-21c-1,0-2.1,0-3.1,0.1c-1.4,0.1-2.8-0.3-4-1.2c-10-7.6-22.1-11.6-34.8-11.6c-22.7,0-42.9,13.2-52.3,33.1c-0.9,1.8-2.6,3.1-4.6,3.4C29.3,46.5,10,68.1,10,94c0,24.8,17.5,45.5,40.9,50.4v-15.3c0-1.9,0.3-3.7,0.9-5.5c-12.5-4.1-21.5-15.8-21.5-29.7c0-17.2,14-31.2,31.3-31.2c0.9,0,1.7,0.1,2.6,0.1c5,0.4,9.5-2.8,10.7-7.7C79,38.6,94,26.9,111.2,26.9c9.8,0,19.2,3.8,26.2,10.7c2.4,2.4,5.8,3.4,9.2,2.7c2.1-0.4,4.3-0.7,6.4-0.7c12.1,0,22.8,6.8,28.1,17.7c1.9,3.8,5.9,6.1,10.2,5.7c1.1-0.1,2.1-0.1,3.1-0.1c17.2,0,31.3,14,31.3,31.2c0,13.8-9,25.6-21.5,29.7c0.6,1.7,0.9,3.5,0.9,5.5v15.3c23.3-4.9,40.9-25.7,40.9-50.4C246,67.1,225.2,44.9,198.8,42.7z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </i>
                                    </div>
                                </div>
                                <div class="pl-4 w-full">
                                    <div>
                                        <h2 class="text-white text-lg text-center font-extrabold">
                                            {{ $onlyHostingCount }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            Hosting Only
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                    <button type="button" class="">
                        <a href="{{ route('domain.index', ['onlyHosting' => '3']) }}"
                            class="group hover:scale-110 transition ease-out duration-1000 lg:col-span-1 col-span-1 w-full flex">
                            <div
                                class="w-full rounded-2xl dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="lg:w-12 lg:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class=" w-5 fill-white">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 256 256" enable-background="new 0 0 256 256"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M188,80.8H68c-3.8,0-7,3.1-7,6.9v23.6c0,3.8,3.1,6.9,7,6.9h120c3.8,0,7-3.1,7-6.9V87.8C194.9,83.9,191.8,80.8,188,80.8z M73.6,97.3c-2.4,0-4.3-1.9-4.3-4.3c0-2.4,1.9-4.3,4.3-4.3s4.3,1.9,4.3,4.3S76,97.3,73.6,97.3z M176.6,109.7h-30.3V99.6h30.3V109.7L176.6,109.7z" />
                                                                <path
                                                                    d="M188,122.2H68c-3.8,0-7,3.1-7,7v23.6c0,3.8,3.1,6.9,7,6.9h120c3.8,0,7-3.1,7-6.9v-23.6C194.9,125.3,191.8,122.2,188,122.2z M73.6,138.7c-2.4,0-4.3-1.9-4.3-4.3c0-2.4,1.9-4.3,4.3-4.3s4.3,1.9,4.3,4.3C77.9,136.8,76,138.7,73.6,138.7z M176.6,151.1h-30.3V141h30.3V151.1L176.6,151.1z" />
                                                                <path
                                                                    d="M188,163.6H68c-3.8,0-7,3.1-7,6.9v23.6c0,3.8,3.1,7,7,7h120c3.8,0,7-3.1,7-7v-23.6C194.9,166.7,191.8,163.6,188,163.6z M73.6,180.1c-2.4,0-4.3-1.9-4.3-4.3s1.9-4.3,4.3-4.3s4.3,1.9,4.3,4.3S76,180.1,73.6,180.1z M176.6,192.4h-30.3v-10.1h30.3V192.4L176.6,192.4z" />
                                                                <path
                                                                    d="M148.7 223.8L135.9 223.8 135.9 205.2 120 205.2 120 223.8 107.3 223.8 107.3 228.7 62.5 228.7 62.5 244.5 107.3 244.5 107.3 249.4 148.7 249.4 148.7 244.5 193.5 244.5 193.5 228.7 148.7 228.7 z" />
                                                                <path
                                                                    d="M198.8,42.7c-1.7-0.1-3.3-1-4.3-2.4c-9.6-13-25-21-41.5-21c-1,0-2.1,0-3.1,0.1c-1.4,0.1-2.8-0.3-4-1.2c-10-7.6-22.1-11.6-34.8-11.6c-22.7,0-42.9,13.2-52.3,33.1c-0.9,1.8-2.6,3.1-4.6,3.4C29.3,46.5,10,68.1,10,94c0,24.8,17.5,45.5,40.9,50.4v-15.3c0-1.9,0.3-3.7,0.9-5.5c-12.5-4.1-21.5-15.8-21.5-29.7c0-17.2,14-31.2,31.3-31.2c0.9,0,1.7,0.1,2.6,0.1c5,0.4,9.5-2.8,10.7-7.7C79,38.6,94,26.9,111.2,26.9c9.8,0,19.2,3.8,26.2,10.7c2.4,2.4,5.8,3.4,9.2,2.7c2.1-0.4,4.3-0.7,6.4-0.7c12.1,0,22.8,6.8,28.1,17.7c1.9,3.8,5.9,6.1,10.2,5.7c1.1-0.1,2.1-0.1,3.1-0.1c17.2,0,31.3,14,31.3,31.2c0,13.8-9,25.6-21.5,29.7c0.6,1.7,0.9,3.5,0.9,5.5v15.3c23.3-4.9,40.9-25.7,40.9-50.4C246,67.1,225.2,44.9,198.8,42.7z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </i>
                                    </div>
                                </div>
                                <div class="pl-4 w-full">
                                    <div>
                                        <h2 class="text-white text-lg text-center font-extrabold">
                                            {{ $onlyHostingCount }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            Hosting Only
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
@include('components.modal.activeDomain')
@include('components.modal.expiredSoon')
@include('components.modal.expiredDomain')
@include('components.modal.expiredToday')
