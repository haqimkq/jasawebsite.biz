<x-app-layout title="Dashboard">
    @if ($labelUrgentCount > 0)
        <div class="py-3 z-10 w-full alertUrgent px-3 ">
            <div class=" bg-red-200 text-red-800 px-4 py-3 rounded relative ">
                <a href="{{ route('labelDomain.urgent') }}">
                    <p>Terdapat {{ $labelUrgentCount }} Website Urgent</p>
                </a>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500 close-button" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif


    <div class=" pl-3 sm:pl-10 pr-3 space-y-3">
        @include('components.modal.totalDomain')
        @include('components.modal.totalPelanggan')
        @include('components.modal.showMostPelanggan')
        <x-modal.showVendorDomain :vendor="$vendorDomain">
        </x-modal.showVendorDomain>

        @if (Auth::user()->isAdmin == true)
            {{-- Search --}}
            <div class="dark:bg-gray-800 bg-blue-900 p-2 rounded-lg">
                <div class="w-full mx-auto flex justify-center sm:justify-between items-center">
                    <div class="w-full">
                        <select multiple="multiple" class="hidden searchSelect2">
                            <optgroup label="Domain">
                                @foreach ($domains as $item)
                                    <option value="/domain/{{ $item->slug }}">{{ $item->nama_domain }}
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Pelanggan">
                                @foreach ($pelanggans as $items)
                                    <option value="/pelanggan/{{ $items->id }}">{{ $items->nama_pelanggan }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="px-3 justify-end gap-3 items-center text-gray-200 dark:text-gray-400 flex">
                        <a href="{{ route('domain.create') }}" class="hover:text-white dark:hover:text-gray-200">
                            <i title="Tambah Domain" class="fa fa-circle-plus"></i>
                        </a>
                        <a href="{{ route('pelanggan.create') }}" class="hover:text-white dark:hover:text-gray-200">
                            <i title="Tambah Pelanggan" class="fa fa-user-plus"></i>
                        </a>
                        <a href="{{ route('invoice') }}" class="hover:text-white dark:hover:text-gray-200">
                            <i title="Buat Invoice" class="fa fa-file-circle-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="owl-carousel">
                {{-- Total Domain --}}
                <button type="button" data-modal-target="totalDomain" data-modal-toggle="totalDomain"
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-2 border border-gray-400 duration-500">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fa-solid text-white fa-globe"></i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2 class="text-white text-xl text-center font-extrabold">
                                    {{ $totalDomain }}
                                </h2>
                                <h2 class="text-gray-300 text-xs sm:text-sm text-center">
                                    Total Domain
                                </h2>
                            </div>
                        </div>
                    </div>
                </button>

                {{-- Total Pelanggan --}}
                <button data-modal-target="totalPelanggan" data-modal-toggle="totalPelanggan"
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-2 border border-gray-400 duration-500">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fa-solid text-white fa-person fa-xl"></i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2 class="text-white text-xl text-center font-extrabold">
                                    {{ $totalPelanggan }}
                                </h2>
                                <h2 class="text-gray-300 text-xs sm:text-sm text-center">
                                    Total Pelanggan
                                </h2>
                            </div>
                        </div>
                    </div>
                </button>

                {{-- Total User --}}
                {{-- <button
                class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                <a href="{{ route('user.index') }}" class="">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-2 border border-gray-400 duration-500">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fa-solid text-white fa-user"></i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2 class="text-white text-xl text-center font-extrabold">
                                    {{ $totalUser }}
                                </h2>
                                <h2 class="text-gray-300 text-xs sm:text-sm text-center">
                                    Total User
                                </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </button> --}}
                {{-- Rank Pelanggan --}}
                {{-- <button data-modal-target="showMostPelanggan" data-modal-toggle="showMostPelanggan"
                class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                <div
                    class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-2 border border-gray-400 duration-500">
                    <div>
                        <div
                            class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                            <i class="fa-solid text-white fa-ranking-star"></i>
                        </div>
                    </div>
                    <div class="sm:pl-4 pl-1 w-full">
                        <div>
                            <h2 class="text-white text-xl text-center font-extrabold">
                                {{ $totalMostPelanggan->count() }}
                            </h2>
                            <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                Pelanggan Teratas
                            </h2>
                        </div>
                    </div>
                </div>
            </button> --}}

                {{-- To Do --}}
                @if (Auth::user() && Auth::user()->isAdmin == true)
                    <button
                        class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                        <a href="{{ route('todo.index') }}" class="">
                            <div
                                class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-2 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class="fa-solid text-white fa-check"></i>
                                    </div>
                                </div>
                                <div class="sm:pl-4 pl-1 w-full">
                                    <div>
                                        <h2 class="text-white text-xl text-center font-extrabold">
                                            {{ $todo->count() }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            To Do List
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                @else
                    <button
                        class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                        <a href="{{ route('todos.index') }}" class="">
                            <div
                                class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-2 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class="fa-solid text-white fa-check"></i>
                                    </div>
                                </div>
                                <div class="sm:pl-4 pl-1 w-full">
                                    <div>
                                        <h2 class="text-white text-xl text-center font-extrabold">
                                            {{ $todo->count() }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            To Do List
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                @endif
                {{-- Total Vendor --}}
                <button data-modal-target="showVendorDomain" data-modal-toggle="showVendorDomain"
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-2 border border-gray-400 duration-500">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fill-white">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 120.74 122.88" class="w-[15px]"
                                        style="enable-background:new 0 0 120.74 122.88" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                            }
                                        </style>
                                        <g>
                                            <path class="st0"
                                                d="M40.54,0h74.98c1.43,0,2.73,0.59,3.68,1.53l0,0.01l0,0l0,0c0.94,0.95,1.53,2.25,1.53,3.68v71.8 c0,1.44-0.59,2.74-1.53,3.69c-0.95,0.95-2.25,1.53-3.69,1.53H89.2c-0.02-1.59-0.11-3.17-0.27-4.72h26.6c0.13,0,0.26-0.06,0.35-0.15 c0.09-0.09,0.15-0.22,0.15-0.35l0-58.3l0,0c-0.16,0.03-0.33,0.04-0.5,0.04H40.54c-0.17,0-0.34-0.02-0.5-0.04v14.96 c-1.59,0-3.17,0.08-4.72,0.23V5.22c0-1.44,0.59-2.75,1.53-3.69c0.06-0.06,0.11-0.11,0.17-0.16C37.95,0.52,39.19,0,40.54,0L40.54,0 L40.54,0z M71.09,100.3c0.13-0.23,0.26-0.48,0.4-0.73l0.01-0.01c0.16-0.3,0.31-0.6,0.46-0.89c0.17-0.33,0.33-0.67,0.49-1.02 c0.17-0.36,0.32-0.7,0.47-1.04l0.06-0.11c0.22-0.53,0.43-1.05,0.62-1.58c0.19-0.53,0.38-1.07,0.55-1.62l0-0.01 c0.17-0.54,0.32-1.09,0.46-1.65c0.14-0.56,0.27-1.13,0.38-1.7c0.09-0.46,0.17-0.9,0.24-1.34c0.07-0.44,0.13-0.89,0.19-1.35l0-0.01 c0.05-0.4,0.09-0.81,0.13-1.23c0.03-0.33,0.05-0.66,0.07-0.98h-9.83c-0.06,1.28-0.21,2.56-0.42,3.82c-0.23,1.35-0.55,2.7-0.96,4.03 c-0.4,1.31-0.88,2.62-1.43,3.92c-0.5,1.17-1.07,2.34-1.71,3.51L71.09,100.3L71.09,100.3z M68.11,104.84h-9.64 c-0.81,1.16-1.69,2.32-2.62,3.46c-0.97,1.18-2.01,2.37-3.12,3.55c-1.02,1.09-2.11,2.18-3.27,3.27c-0.94,0.89-1.92,1.78-2.93,2.66 l0.81-0.15c0.56-0.11,1.12-0.24,1.69-0.39c0.57-0.14,1.13-0.3,1.68-0.47c0.55-0.17,1.1-0.36,1.65-0.56 c0.55-0.2,1.09-0.42,1.62-0.65c0.55-0.24,1.09-0.48,1.61-0.73c0.52-0.25,1.04-0.52,1.56-0.8c0.51-0.28,1.02-0.56,1.5-0.86 c0.49-0.3,0.98-0.6,1.44-0.92c0.47-0.32,0.94-0.64,1.39-0.98c0.45-0.34,0.9-0.68,1.33-1.04c0.43-0.35,0.86-0.72,1.28-1.11 c0.42-0.38,0.83-0.77,1.23-1.18c0.31-0.32,0.62-0.63,0.92-0.95c0.3-0.32,0.59-0.64,0.87-0.97c0.23-0.26,0.45-0.53,0.67-0.8 L68.11,104.84L68.11,104.84z M33.7,117.78c-1.02-0.88-2-1.77-2.94-2.66c-1.15-1.09-2.24-2.18-3.26-3.27 c-1.11-1.18-2.15-2.36-3.12-3.55c-0.94-1.15-1.81-2.3-2.62-3.46h-9.62l0.32,0.4c0.22,0.27,0.45,0.54,0.67,0.8 c0.57,0.65,1.17,1.29,1.79,1.91l0.01,0.02c0.4,0.4,0.81,0.79,1.23,1.17c0.42,0.38,0.85,0.75,1.28,1.1c0.43,0.36,0.88,0.7,1.33,1.04 c0.46,0.34,0.92,0.66,1.39,0.98c0.46,0.31,0.95,0.62,1.45,0.92c0.49,0.3,0.99,0.58,1.48,0.85c0.52,0.28,1.04,0.55,1.57,0.8 c0.52,0.25,1.06,0.49,1.61,0.73c0.05,0.02,0.07,0.04,0.12,0.07c0.53,0.22,1.05,0.42,1.58,0.62c0.53,0.19,1.07,0.38,1.62,0.55 l0.01,0c0.54,0.17,1.09,0.32,1.65,0.46c0.56,0.14,1.13,0.27,1.7,0.38L33.7,117.78L33.7,117.78z M9.11,100.32h9.82 c-0.64-1.18-1.21-2.35-1.72-3.53c-0.56-1.31-1.04-2.62-1.43-3.93c-0.4-1.34-0.72-2.68-0.95-4.03c-0.22-1.26-0.36-2.52-0.42-3.79 H4.59c0.02,0.32,0.05,0.65,0.07,0.98c0.04,0.42,0.08,0.84,0.13,1.24c0.06,0.47,0.12,0.92,0.19,1.35c0.07,0.43,0.15,0.88,0.24,1.34 l0.01,0.04c0.11,0.56,0.24,1.12,0.38,1.69c0.14,0.57,0.3,1.13,0.47,1.68c0.17,0.55,0.36,1.1,0.56,1.65 c0.2,0.55,0.42,1.09,0.65,1.62l0.01,0.02c0.14,0.33,0.29,0.67,0.45,1.01l0.01,0.01c0.15,0.32,0.31,0.65,0.47,0.99 c0.16,0.32,0.31,0.62,0.47,0.92C8.84,99.82,8.97,100.07,9.11,100.32L9.11,100.32z M4.59,80.52h9.92c0.11-1.25,0.3-2.5,0.56-3.76 c0.28-1.34,0.64-2.68,1.08-4.02l0.01-0.02c0.43-1.31,0.95-2.62,1.54-3.92c0.54-1.19,1.14-2.38,1.81-3.57H9.11 c-0.14,0.25-0.28,0.51-0.41,0.75c-0.16,0.29-0.31,0.6-0.47,0.92l-0.01,0.01c-0.17,0.33-0.32,0.66-0.48,0.99 c-0.16,0.34-0.31,0.68-0.45,1.02l-0.03,0.06l-0.04,0.06c-0.22,0.52-0.42,1.05-0.62,1.58c-0.19,0.54-0.38,1.08-0.55,1.62 c-0.17,0.55-0.33,1.1-0.47,1.67c-0.14,0.56-0.27,1.13-0.38,1.7c-0.09,0.46-0.17,0.91-0.24,1.34c-0.07,0.44-0.14,0.89-0.19,1.35 c-0.05,0.41-0.09,0.82-0.13,1.24C4.63,79.87,4.6,80.2,4.59,80.52L4.59,80.52z M12.1,60.72h10.25c0.81-1.15,1.67-2.29,2.59-3.44 c0.95-1.18,1.97-2.36,3.04-3.55c1-1.1,2.07-2.2,3.19-3.31c0.92-0.91,1.89-1.83,2.89-2.74l-0.42,0.07l-0.72,0.14 c-0.56,0.11-1.13,0.24-1.7,0.39c-0.57,0.14-1.13,0.3-1.69,0.47c-0.55,0.17-1.1,0.36-1.65,0.56c-0.55,0.2-1.09,0.42-1.62,0.65 c-0.56,0.24-1.09,0.49-1.61,0.74c-0.52,0.25-1.04,0.52-1.55,0.79c-0.52,0.28-1.02,0.57-1.51,0.86c-0.49,0.29-0.97,0.6-1.43,0.91 c-0.48,0.32-0.94,0.65-1.39,0.98c-0.46,0.34-0.9,0.68-1.33,1.04c-0.43,0.35-0.86,0.72-1.28,1.11c-0.41,0.38-0.82,0.77-1.23,1.18 l-0.02,0.01c-0.31,0.31-0.61,0.62-0.9,0.93c-0.3,0.32-0.59,0.64-0.87,0.97c-0.23,0.26-0.46,0.53-0.68,0.81L12.1,60.72L12.1,60.72z M46.18,47.72c1,0.91,1.96,1.82,2.88,2.73c1.12,1.1,2.17,2.2,3.17,3.29c1.08,1.18,2.09,2.36,3.04,3.55 c0.92,1.15,1.78,2.29,2.58,3.44h10.23l-0.32-0.41c-0.22-0.27-0.44-0.53-0.67-0.8c-0.28-0.32-0.57-0.65-0.87-0.97 c-0.29-0.31-0.59-0.62-0.92-0.95c-0.41-0.41-0.82-0.81-1.24-1.18c-0.42-0.39-0.85-0.75-1.28-1.1c-0.43-0.36-0.88-0.7-1.33-1.04 c-0.46-0.34-0.92-0.66-1.39-0.98c-0.47-0.31-0.95-0.62-1.44-0.92c-0.49-0.3-0.99-0.58-1.5-0.86c-0.51-0.28-1.03-0.54-1.55-0.79 c-0.52-0.25-1.06-0.49-1.62-0.73c-0.05-0.02-0.07-0.04-0.12-0.07c-0.53-0.22-1.06-0.43-1.58-0.62c-0.53-0.19-1.07-0.38-1.62-0.55 l-0.01,0c-0.54-0.17-1.1-0.32-1.65-0.47c-0.56-0.14-1.12-0.27-1.7-0.38l-0.72-0.14L46.18,47.72L46.18,47.72z M71.09,65.23H60.71 c0.67,1.19,1.27,2.38,1.8,3.56c0.59,1.31,1.11,2.63,1.54,3.94c0.44,1.34,0.81,2.68,1.08,4.02c0.26,1.26,0.45,2.51,0.56,3.76h9.91 c-0.02-0.32-0.05-0.65-0.07-0.98c-0.04-0.42-0.08-0.83-0.13-1.24c-0.06-0.47-0.12-0.92-0.19-1.35c-0.07-0.43-0.15-0.88-0.24-1.34 l-0.01-0.04c-0.11-0.56-0.24-1.12-0.39-1.69c-0.14-0.57-0.3-1.13-0.47-1.68c-0.17-0.55-0.36-1.1-0.56-1.65 c-0.2-0.55-0.42-1.08-0.64-1.61l-0.01-0.03c-0.14-0.33-0.29-0.67-0.45-1.01l-0.01-0.01c-0.14-0.31-0.3-0.64-0.47-0.99 c-0.16-0.33-0.32-0.63-0.47-0.91C71.38,65.75,71.24,65.49,71.09,65.23L71.09,65.23z M32.06,43.47c0.66-0.13,1.32-0.25,1.97-0.35 c0.65-0.1,1.31-0.18,1.99-0.25c0.68-0.07,1.36-0.12,2.04-0.15c0.69-0.03,1.38-0.05,2.06-0.05c1.37,0,2.73,0.07,4.08,0.2 c0.68,0.07,1.34,0.15,2,0.25c0.65,0.1,1.31,0.21,1.98,0.35c0.64,0.12,1.28,0.27,1.91,0.43c0.63,0.16,1.26,0.34,1.89,0.53 c0.62,0.19,1.24,0.4,1.85,0.62c0.6,0.22,1.21,0.46,1.81,0.72c0.07,0.02,0.11,0.04,0.18,0.08c0.57,0.25,1.14,0.51,1.72,0.79 c0.59,0.28,1.16,0.58,1.71,0.88l0.01,0.01c0.57,0.31,1.13,0.63,1.68,0.96l0.01,0.01c0.56,0.34,1.11,0.68,1.64,1.04 c0.52,0.35,1.04,0.71,1.55,1.08c0.51,0.38,1.01,0.77,1.51,1.17c0.5,0.41,0.98,0.83,1.46,1.26c0.49,0.44,0.96,0.89,1.41,1.34 l0.02,0.02c0.45,0.44,0.89,0.9,1.31,1.37c0.43,0.47,0.84,0.95,1.25,1.45c0.4,0.49,0.79,0.99,1.17,1.51 c0.38,0.52,0.75,1.05,1.11,1.58l0.01,0.01c0.36,0.54,0.7,1.08,1.03,1.61c0.33,0.55,0.66,1.11,0.97,1.69 c0.31,0.56,0.6,1.14,0.88,1.73c0.29,0.6,0.56,1.19,0.82,1.79c0.26,0.61,0.51,1.22,0.74,1.85c0.23,0.62,0.44,1.25,0.64,1.89 c0.2,0.64,0.38,1.27,0.54,1.91c0.16,0.63,0.31,1.28,0.44,1.94c0.13,0.66,0.25,1.31,0.35,1.97c0.1,0.65,0.18,1.32,0.25,2 c0.07,0.68,0.12,1.36,0.15,2.04c0.03,0.69,0.05,1.38,0.05,2.06c0,0.68-0.02,1.36-0.05,2.05c-0.03,0.68-0.08,1.35-0.15,2.03 c-0.07,0.68-0.15,1.35-0.25,2l0,0.01c-0.1,0.64-0.21,1.3-0.35,1.96c-0.12,0.64-0.27,1.28-0.43,1.91c-0.16,0.63-0.34,1.26-0.53,1.89 c-0.19,0.62-0.4,1.24-0.62,1.85c-0.22,0.6-0.46,1.21-0.72,1.8c-0.02,0.08-0.05,0.12-0.09,0.19c-0.25,0.59-0.52,1.17-0.8,1.75 c-0.28,0.58-0.58,1.15-0.89,1.72c-0.32,0.58-0.64,1.14-0.96,1.68c-0.33,0.55-0.67,1.09-1.03,1.62c-0.35,0.52-0.71,1.04-1.09,1.56 c-0.38,0.51-0.77,1.01-1.17,1.5l-0.01,0.01c-0.41,0.5-0.83,0.99-1.26,1.46l-0.01,0.01c-0.44,0.48-0.88,0.94-1.32,1.39l-0.03,0.03 c-0.45,0.45-0.9,0.89-1.36,1.31c-0.47,0.42-0.95,0.84-1.44,1.25c-0.49,0.4-0.99,0.79-1.51,1.18c-0.52,0.38-1.04,0.75-1.57,1.1 c-0.53,0.36-1.07,0.71-1.62,1.04c-0.55,0.33-1.12,0.66-1.7,0.97c-0.57,0.31-1.15,0.6-1.73,0.89c-0.59,0.29-1.19,0.56-1.78,0.81 c-0.61,0.26-1.23,0.51-1.85,0.74c-0.62,0.23-1.25,0.44-1.89,0.64c-0.63,0.2-1.26,0.37-1.9,0.53c-0.63,0.16-1.28,0.31-1.95,0.44 c-0.66,0.13-1.31,0.25-1.97,0.35c-0.65,0.1-1.32,0.18-2,0.25c-1.36,0.13-2.72,0.2-4.1,0.2c-0.68,0-1.36-0.02-2.05-0.05 c-0.68-0.03-1.35-0.08-2.03-0.15c-0.68-0.07-1.35-0.15-2-0.25c-0.65-0.1-1.31-0.21-1.97-0.35c-0.64-0.12-1.28-0.27-1.91-0.43 c-0.63-0.16-1.26-0.34-1.88-0.53c-0.62-0.19-1.23-0.4-1.84-0.62c-0.61-0.22-1.22-0.47-1.83-0.72c-0.06-0.03-0.11-0.04-0.17-0.08 c-0.57-0.25-1.15-0.51-1.72-0.79c-0.58-0.28-1.15-0.57-1.7-0.87c-0.57-0.31-1.13-0.63-1.68-0.96c-0.57-0.34-1.13-0.69-1.67-1.05 c-0.52-0.35-1.04-0.71-1.55-1.09c-0.51-0.38-1.01-0.77-1.5-1.17c-0.5-0.41-0.99-0.83-1.47-1.27c-0.49-0.45-0.96-0.89-1.4-1.33 l-0.02-0.02c-0.45-0.45-0.89-0.9-1.31-1.37c-0.42-0.46-0.84-0.95-1.25-1.44c-0.4-0.49-0.8-1-1.18-1.52 c-0.38-0.51-0.75-1.04-1.1-1.57c-0.36-0.53-0.7-1.07-1.04-1.62c-0.33-0.55-0.66-1.12-0.97-1.7c-0.31-0.57-0.6-1.14-0.89-1.73 c-0.29-0.59-0.56-1.19-0.81-1.78c-0.26-0.61-0.51-1.23-0.74-1.85c-0.23-0.62-0.44-1.25-0.64-1.89c-0.2-0.63-0.37-1.26-0.53-1.9 c-0.16-0.63-0.31-1.28-0.44-1.95c-0.14-0.66-0.25-1.32-0.35-1.98c-0.1-0.65-0.18-1.31-0.25-1.99c-0.07-0.68-0.12-1.36-0.15-2.04 C0.02,84.14,0,83.46,0,82.78c0-1.37,0.07-2.73,0.2-4.08c0.07-0.68,0.15-1.34,0.25-2c0.1-0.65,0.21-1.31,0.35-1.98 c0.12-0.64,0.27-1.27,0.43-1.91c0.16-0.63,0.34-1.26,0.53-1.89c0.19-0.62,0.4-1.24,0.62-1.85c0.22-0.6,0.46-1.2,0.71-1.8 c0.02-0.06,0.03-0.08,0.06-0.14l0.03-0.05c0.25-0.59,0.52-1.18,0.8-1.76c0.28-0.58,0.58-1.15,0.89-1.72 c0.31-0.58,0.64-1.14,0.96-1.68c0.33-0.55,0.67-1.09,1.03-1.62c0.35-0.52,0.71-1.04,1.09-1.55c0.38-0.51,0.77-1.01,1.17-1.5 c0.41-0.5,0.83-0.98,1.26-1.46c0.44-0.49,0.89-0.96,1.34-1.41l0.02-0.02c0.45-0.45,0.91-0.89,1.37-1.32 c0.47-0.43,0.95-0.84,1.45-1.25c0.5-0.41,1-0.8,1.51-1.17l0.02-0.01c0.52-0.38,1.04-0.75,1.56-1.09c0.53-0.36,1.07-0.71,1.62-1.04 c0.55-0.33,1.12-0.66,1.7-0.97c0.56-0.31,1.14-0.6,1.73-0.88c0.59-0.29,1.19-0.56,1.78-0.81l0.02-0.01 c0.62-0.27,1.23-0.51,1.84-0.73c0.62-0.23,1.25-0.44,1.89-0.64c0.63-0.2,1.27-0.38,1.91-0.54c0.63-0.16,1.28-0.31,1.94-0.44 L32.06,43.47L32.06,43.47z M42.36,50.34v10.37h9.9c-0.61-0.78-1.26-1.56-1.93-2.35c-0.79-0.92-1.63-1.85-2.51-2.77 c-0.89-0.93-1.83-1.87-2.81-2.82C44.16,51.98,43.28,51.16,42.36,50.34L42.36,50.34z M42.36,65.23v15.29h18.82 c-0.12-1.18-0.32-2.36-0.6-3.55c-0.3-1.28-0.68-2.56-1.16-3.85c-0.49-1.32-1.07-2.65-1.74-3.98c-0.65-1.3-1.4-2.6-2.23-3.9H42.36 L42.36,65.23z M42.36,85.04v15.29h13.69c0.8-1.28,1.51-2.55,2.13-3.83c0.64-1.32,1.18-2.63,1.62-3.95 c0.43-1.29,0.77-2.59,1.02-3.88c0.23-1.21,0.38-2.41,0.45-3.62H42.36L42.36,85.04z M42.36,104.84v10.56 c0.98-0.82,1.92-1.65,2.83-2.48c1.04-0.95,2.03-1.9,2.97-2.84c0.94-0.95,1.82-1.89,2.66-2.83c0.71-0.8,1.39-1.61,2.03-2.41H42.36 L42.36,104.84z M37.84,115.4v-10.57H27.36c0.64,0.81,1.32,1.61,2.02,2.41c0.83,0.94,1.71,1.88,2.65,2.82 c0.94,0.95,1.93,1.89,2.97,2.84C35.9,113.75,36.85,114.57,37.84,115.4L37.84,115.4z M37.84,100.32V85.04H18.93 c0.07,1.21,0.23,2.41,0.46,3.62c0.25,1.3,0.59,2.59,1.03,3.89c0.44,1.32,0.98,2.64,1.62,3.95c0.62,1.28,1.32,2.56,2.12,3.83H37.84 L37.84,100.32z M37.84,80.52V65.23h-13.1c-0.83,1.3-1.57,2.6-2.23,3.9c-0.67,1.33-1.25,2.66-1.74,3.98 c-0.47,1.29-0.86,2.57-1.16,3.85c-0.28,1.19-0.47,2.37-0.6,3.55H37.84L37.84,80.52z M37.84,60.72V50.34 c-0.92,0.82-1.8,1.63-2.64,2.44c-0.99,0.94-1.93,1.89-2.82,2.82c-0.88,0.92-1.72,1.85-2.51,2.77c-0.67,0.78-1.32,1.57-1.93,2.35 H37.84L37.84,60.72z M85.61,64.33h19.93c1.1,0,1.99,0.97,1.99,2.16c0,1.19-0.89,2.16-1.99,2.16h-18.4 C86.7,67.18,86.19,65.74,85.61,64.33L85.61,64.33z M80.55,54.94c0.16-0.05,0.33-0.07,0.51-0.07h24.48c1.1,0,1.99,0.97,1.99,2.16 c0,1.19-0.89,2.16-1.99,2.16H83.18C82.37,57.73,81.5,56.31,80.55,54.94L80.55,54.94z M47.55,24.17h59.75v23.39H74.32 c-7.16-6.96-16.43-11.75-26.77-13.33V24.17L47.55,24.17z M70.16,6.75c1.87,0,3.39,1.52,3.39,3.39c0,1.87-1.52,3.39-3.39,3.39 s-3.39-1.52-3.39-3.39C66.77,8.27,68.29,6.75,70.16,6.75L70.16,6.75z M58.3,6.75c1.87,0,3.39,1.52,3.39,3.39 c0,1.87-1.52,3.39-3.39,3.39c-1.87,0-3.39-1.52-3.39-3.39C54.9,8.27,56.42,6.75,58.3,6.75L58.3,6.75z M46.43,6.75 c1.87,0,3.39,1.52,3.39,3.39c0,1.87-1.52,3.39-3.39,3.39c-1.87,0-3.39-1.52-3.39-3.39C43.04,8.27,44.56,6.75,46.43,6.75L46.43,6.75 z" />
                                        </g>
                                    </svg>
                                </i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2 class="text-white text-xl text-center font-extrabold">
                                    {{ count($vendorDomain) }}
                                </h2>
                                <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                    Total Vendor
                                </h2>
                            </div>
                        </div>
                    </div>
                </button>
                {{-- <button
                class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-[85.33px] lg:hidden block">
                <a href="{{ route('invoice') }}" class="h-full">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-2 border border-gray-400 duration-500 h-full">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fa-solid text-white fa-file"></i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2
                                    class="text-gray-300 text-sm sm:text-base font-extrabold text-center whitespace-nowrap">
                                    Buat Invoice
                                </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </button> --}}
            </div>
            {{-- Button --}}
            <div
                class="lg:grid sm:grid-cols-3 lg:grid-cols-4 grid-cols-2 gap-3 place-content-center place-items-center hidden">
                {{-- Total Domain --}}
                <button type="button" data-modal-target="totalDomain" data-modal-toggle="totalDomain"
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fa-solid text-white fa-globe"></i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2 class="text-white text-xl text-center font-extrabold">
                                    {{ $totalDomain }}
                                </h2>
                                <h2 class="text-gray-300 text-xs sm:text-sm text-center">
                                    Total Domain
                                </h2>
                            </div>
                        </div>
                    </div>
                </button>
                @include('components.modal.totalDomain')
                {{-- Total Pelanggan --}}
                <button data-modal-target="totalPelanggan" data-modal-toggle="totalPelanggan"
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fa-solid text-white fa-person fa-xl"></i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2 class="text-white text-xl text-center font-extrabold">
                                    {{ $totalPelanggan }}
                                </h2>
                                <h2 class="text-gray-300 text-xs sm:text-sm text-center">
                                    Total Pelanggan
                                </h2>
                            </div>
                        </div>
                    </div>
                </button>
                @include('components.modal.totalPelanggan')
                {{-- Total User --}}
                {{-- <button
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                    <a href="{{ route('user.index') }}" class="">
                        <div
                            class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                            <div>
                                <div
                                    class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                    <i class="fa-solid text-white fa-user"></i>
                                </div>
                            </div>
                            <div class="sm:pl-4 pl-1 w-full">
                                <div>
                                    <h2 class="text-white text-xl text-center font-extrabold">
                                        {{ $totalUser }}
                                    </h2>
                                    <h2 class="text-gray-300 text-xs sm:text-sm text-center">
                                        Total User
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </button> --}}
                {{-- Rank Pelanggan --}}
                {{-- <button data-modal-target="showMostPelanggan" data-modal-toggle="showMostPelanggan"
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fa-solid text-white fa-ranking-star"></i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2 class="text-white text-xl text-center font-extrabold">
                                    {{ $totalMostPelanggan->count() }}
                                </h2>
                                <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                    Pelanggan Teratas
                                </h2>
                            </div>
                        </div>
                    </div>
                </button> --}}
                @include('components.modal.showMostPelanggan')
                {{-- To Do --}}
                @if (Auth::user() && Auth::user()->isAdmin == true)
                    <button
                        class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                        <a href="{{ route('todo.index') }}" class="">
                            <div
                                class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class="fa-solid text-white fa-check"></i>
                                    </div>
                                </div>
                                <div class="sm:pl-4 pl-1 w-full">
                                    <div>
                                        <h2 class="text-white text-xl text-center font-extrabold">
                                            {{ $todo->count() }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            To Do List
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                @else
                    <button
                        class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                        <a href="{{ route('todos.index') }}" class="">
                            <div
                                class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                <div>
                                    <div
                                        class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                        <i class="fa-solid text-white fa-check"></i>
                                    </div>
                                </div>
                                <div class="sm:pl-4 pl-1 w-full">
                                    <div>
                                        <h2 class="text-white text-xl text-center font-extrabold">
                                            {{ $todo->count() }}
                                        </h2>
                                        <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                            To Do List
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </button>
                @endif
                {{-- Total Vendor --}}
                <button data-modal-target="showVendorDomain" data-modal-toggle="showVendorDomain"
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                    <div
                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                        <div>
                            <div
                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                <i class="fill-white">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 120.74 122.88" class="w-[15px]"
                                        style="enable-background:new 0 0 120.74 122.88" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                            }
                                        </style>
                                        <g>
                                            <path class="st0"
                                                d="M40.54,0h74.98c1.43,0,2.73,0.59,3.68,1.53l0,0.01l0,0l0,0c0.94,0.95,1.53,2.25,1.53,3.68v71.8 c0,1.44-0.59,2.74-1.53,3.69c-0.95,0.95-2.25,1.53-3.69,1.53H89.2c-0.02-1.59-0.11-3.17-0.27-4.72h26.6c0.13,0,0.26-0.06,0.35-0.15 c0.09-0.09,0.15-0.22,0.15-0.35l0-58.3l0,0c-0.16,0.03-0.33,0.04-0.5,0.04H40.54c-0.17,0-0.34-0.02-0.5-0.04v14.96 c-1.59,0-3.17,0.08-4.72,0.23V5.22c0-1.44,0.59-2.75,1.53-3.69c0.06-0.06,0.11-0.11,0.17-0.16C37.95,0.52,39.19,0,40.54,0L40.54,0 L40.54,0z M71.09,100.3c0.13-0.23,0.26-0.48,0.4-0.73l0.01-0.01c0.16-0.3,0.31-0.6,0.46-0.89c0.17-0.33,0.33-0.67,0.49-1.02 c0.17-0.36,0.32-0.7,0.47-1.04l0.06-0.11c0.22-0.53,0.43-1.05,0.62-1.58c0.19-0.53,0.38-1.07,0.55-1.62l0-0.01 c0.17-0.54,0.32-1.09,0.46-1.65c0.14-0.56,0.27-1.13,0.38-1.7c0.09-0.46,0.17-0.9,0.24-1.34c0.07-0.44,0.13-0.89,0.19-1.35l0-0.01 c0.05-0.4,0.09-0.81,0.13-1.23c0.03-0.33,0.05-0.66,0.07-0.98h-9.83c-0.06,1.28-0.21,2.56-0.42,3.82c-0.23,1.35-0.55,2.7-0.96,4.03 c-0.4,1.31-0.88,2.62-1.43,3.92c-0.5,1.17-1.07,2.34-1.71,3.51L71.09,100.3L71.09,100.3z M68.11,104.84h-9.64 c-0.81,1.16-1.69,2.32-2.62,3.46c-0.97,1.18-2.01,2.37-3.12,3.55c-1.02,1.09-2.11,2.18-3.27,3.27c-0.94,0.89-1.92,1.78-2.93,2.66 l0.81-0.15c0.56-0.11,1.12-0.24,1.69-0.39c0.57-0.14,1.13-0.3,1.68-0.47c0.55-0.17,1.1-0.36,1.65-0.56 c0.55-0.2,1.09-0.42,1.62-0.65c0.55-0.24,1.09-0.48,1.61-0.73c0.52-0.25,1.04-0.52,1.56-0.8c0.51-0.28,1.02-0.56,1.5-0.86 c0.49-0.3,0.98-0.6,1.44-0.92c0.47-0.32,0.94-0.64,1.39-0.98c0.45-0.34,0.9-0.68,1.33-1.04c0.43-0.35,0.86-0.72,1.28-1.11 c0.42-0.38,0.83-0.77,1.23-1.18c0.31-0.32,0.62-0.63,0.92-0.95c0.3-0.32,0.59-0.64,0.87-0.97c0.23-0.26,0.45-0.53,0.67-0.8 L68.11,104.84L68.11,104.84z M33.7,117.78c-1.02-0.88-2-1.77-2.94-2.66c-1.15-1.09-2.24-2.18-3.26-3.27 c-1.11-1.18-2.15-2.36-3.12-3.55c-0.94-1.15-1.81-2.3-2.62-3.46h-9.62l0.32,0.4c0.22,0.27,0.45,0.54,0.67,0.8 c0.57,0.65,1.17,1.29,1.79,1.91l0.01,0.02c0.4,0.4,0.81,0.79,1.23,1.17c0.42,0.38,0.85,0.75,1.28,1.1c0.43,0.36,0.88,0.7,1.33,1.04 c0.46,0.34,0.92,0.66,1.39,0.98c0.46,0.31,0.95,0.62,1.45,0.92c0.49,0.3,0.99,0.58,1.48,0.85c0.52,0.28,1.04,0.55,1.57,0.8 c0.52,0.25,1.06,0.49,1.61,0.73c0.05,0.02,0.07,0.04,0.12,0.07c0.53,0.22,1.05,0.42,1.58,0.62c0.53,0.19,1.07,0.38,1.62,0.55 l0.01,0c0.54,0.17,1.09,0.32,1.65,0.46c0.56,0.14,1.13,0.27,1.7,0.38L33.7,117.78L33.7,117.78z M9.11,100.32h9.82 c-0.64-1.18-1.21-2.35-1.72-3.53c-0.56-1.31-1.04-2.62-1.43-3.93c-0.4-1.34-0.72-2.68-0.95-4.03c-0.22-1.26-0.36-2.52-0.42-3.79 H4.59c0.02,0.32,0.05,0.65,0.07,0.98c0.04,0.42,0.08,0.84,0.13,1.24c0.06,0.47,0.12,0.92,0.19,1.35c0.07,0.43,0.15,0.88,0.24,1.34 l0.01,0.04c0.11,0.56,0.24,1.12,0.38,1.69c0.14,0.57,0.3,1.13,0.47,1.68c0.17,0.55,0.36,1.1,0.56,1.65 c0.2,0.55,0.42,1.09,0.65,1.62l0.01,0.02c0.14,0.33,0.29,0.67,0.45,1.01l0.01,0.01c0.15,0.32,0.31,0.65,0.47,0.99 c0.16,0.32,0.31,0.62,0.47,0.92C8.84,99.82,8.97,100.07,9.11,100.32L9.11,100.32z M4.59,80.52h9.92c0.11-1.25,0.3-2.5,0.56-3.76 c0.28-1.34,0.64-2.68,1.08-4.02l0.01-0.02c0.43-1.31,0.95-2.62,1.54-3.92c0.54-1.19,1.14-2.38,1.81-3.57H9.11 c-0.14,0.25-0.28,0.51-0.41,0.75c-0.16,0.29-0.31,0.6-0.47,0.92l-0.01,0.01c-0.17,0.33-0.32,0.66-0.48,0.99 c-0.16,0.34-0.31,0.68-0.45,1.02l-0.03,0.06l-0.04,0.06c-0.22,0.52-0.42,1.05-0.62,1.58c-0.19,0.54-0.38,1.08-0.55,1.62 c-0.17,0.55-0.33,1.1-0.47,1.67c-0.14,0.56-0.27,1.13-0.38,1.7c-0.09,0.46-0.17,0.91-0.24,1.34c-0.07,0.44-0.14,0.89-0.19,1.35 c-0.05,0.41-0.09,0.82-0.13,1.24C4.63,79.87,4.6,80.2,4.59,80.52L4.59,80.52z M12.1,60.72h10.25c0.81-1.15,1.67-2.29,2.59-3.44 c0.95-1.18,1.97-2.36,3.04-3.55c1-1.1,2.07-2.2,3.19-3.31c0.92-0.91,1.89-1.83,2.89-2.74l-0.42,0.07l-0.72,0.14 c-0.56,0.11-1.13,0.24-1.7,0.39c-0.57,0.14-1.13,0.3-1.69,0.47c-0.55,0.17-1.1,0.36-1.65,0.56c-0.55,0.2-1.09,0.42-1.62,0.65 c-0.56,0.24-1.09,0.49-1.61,0.74c-0.52,0.25-1.04,0.52-1.55,0.79c-0.52,0.28-1.02,0.57-1.51,0.86c-0.49,0.29-0.97,0.6-1.43,0.91 c-0.48,0.32-0.94,0.65-1.39,0.98c-0.46,0.34-0.9,0.68-1.33,1.04c-0.43,0.35-0.86,0.72-1.28,1.11c-0.41,0.38-0.82,0.77-1.23,1.18 l-0.02,0.01c-0.31,0.31-0.61,0.62-0.9,0.93c-0.3,0.32-0.59,0.64-0.87,0.97c-0.23,0.26-0.46,0.53-0.68,0.81L12.1,60.72L12.1,60.72z M46.18,47.72c1,0.91,1.96,1.82,2.88,2.73c1.12,1.1,2.17,2.2,3.17,3.29c1.08,1.18,2.09,2.36,3.04,3.55 c0.92,1.15,1.78,2.29,2.58,3.44h10.23l-0.32-0.41c-0.22-0.27-0.44-0.53-0.67-0.8c-0.28-0.32-0.57-0.65-0.87-0.97 c-0.29-0.31-0.59-0.62-0.92-0.95c-0.41-0.41-0.82-0.81-1.24-1.18c-0.42-0.39-0.85-0.75-1.28-1.1c-0.43-0.36-0.88-0.7-1.33-1.04 c-0.46-0.34-0.92-0.66-1.39-0.98c-0.47-0.31-0.95-0.62-1.44-0.92c-0.49-0.3-0.99-0.58-1.5-0.86c-0.51-0.28-1.03-0.54-1.55-0.79 c-0.52-0.25-1.06-0.49-1.62-0.73c-0.05-0.02-0.07-0.04-0.12-0.07c-0.53-0.22-1.06-0.43-1.58-0.62c-0.53-0.19-1.07-0.38-1.62-0.55 l-0.01,0c-0.54-0.17-1.1-0.32-1.65-0.47c-0.56-0.14-1.12-0.27-1.7-0.38l-0.72-0.14L46.18,47.72L46.18,47.72z M71.09,65.23H60.71 c0.67,1.19,1.27,2.38,1.8,3.56c0.59,1.31,1.11,2.63,1.54,3.94c0.44,1.34,0.81,2.68,1.08,4.02c0.26,1.26,0.45,2.51,0.56,3.76h9.91 c-0.02-0.32-0.05-0.65-0.07-0.98c-0.04-0.42-0.08-0.83-0.13-1.24c-0.06-0.47-0.12-0.92-0.19-1.35c-0.07-0.43-0.15-0.88-0.24-1.34 l-0.01-0.04c-0.11-0.56-0.24-1.12-0.39-1.69c-0.14-0.57-0.3-1.13-0.47-1.68c-0.17-0.55-0.36-1.1-0.56-1.65 c-0.2-0.55-0.42-1.08-0.64-1.61l-0.01-0.03c-0.14-0.33-0.29-0.67-0.45-1.01l-0.01-0.01c-0.14-0.31-0.3-0.64-0.47-0.99 c-0.16-0.33-0.32-0.63-0.47-0.91C71.38,65.75,71.24,65.49,71.09,65.23L71.09,65.23z M32.06,43.47c0.66-0.13,1.32-0.25,1.97-0.35 c0.65-0.1,1.31-0.18,1.99-0.25c0.68-0.07,1.36-0.12,2.04-0.15c0.69-0.03,1.38-0.05,2.06-0.05c1.37,0,2.73,0.07,4.08,0.2 c0.68,0.07,1.34,0.15,2,0.25c0.65,0.1,1.31,0.21,1.98,0.35c0.64,0.12,1.28,0.27,1.91,0.43c0.63,0.16,1.26,0.34,1.89,0.53 c0.62,0.19,1.24,0.4,1.85,0.62c0.6,0.22,1.21,0.46,1.81,0.72c0.07,0.02,0.11,0.04,0.18,0.08c0.57,0.25,1.14,0.51,1.72,0.79 c0.59,0.28,1.16,0.58,1.71,0.88l0.01,0.01c0.57,0.31,1.13,0.63,1.68,0.96l0.01,0.01c0.56,0.34,1.11,0.68,1.64,1.04 c0.52,0.35,1.04,0.71,1.55,1.08c0.51,0.38,1.01,0.77,1.51,1.17c0.5,0.41,0.98,0.83,1.46,1.26c0.49,0.44,0.96,0.89,1.41,1.34 l0.02,0.02c0.45,0.44,0.89,0.9,1.31,1.37c0.43,0.47,0.84,0.95,1.25,1.45c0.4,0.49,0.79,0.99,1.17,1.51 c0.38,0.52,0.75,1.05,1.11,1.58l0.01,0.01c0.36,0.54,0.7,1.08,1.03,1.61c0.33,0.55,0.66,1.11,0.97,1.69 c0.31,0.56,0.6,1.14,0.88,1.73c0.29,0.6,0.56,1.19,0.82,1.79c0.26,0.61,0.51,1.22,0.74,1.85c0.23,0.62,0.44,1.25,0.64,1.89 c0.2,0.64,0.38,1.27,0.54,1.91c0.16,0.63,0.31,1.28,0.44,1.94c0.13,0.66,0.25,1.31,0.35,1.97c0.1,0.65,0.18,1.32,0.25,2 c0.07,0.68,0.12,1.36,0.15,2.04c0.03,0.69,0.05,1.38,0.05,2.06c0,0.68-0.02,1.36-0.05,2.05c-0.03,0.68-0.08,1.35-0.15,2.03 c-0.07,0.68-0.15,1.35-0.25,2l0,0.01c-0.1,0.64-0.21,1.3-0.35,1.96c-0.12,0.64-0.27,1.28-0.43,1.91c-0.16,0.63-0.34,1.26-0.53,1.89 c-0.19,0.62-0.4,1.24-0.62,1.85c-0.22,0.6-0.46,1.21-0.72,1.8c-0.02,0.08-0.05,0.12-0.09,0.19c-0.25,0.59-0.52,1.17-0.8,1.75 c-0.28,0.58-0.58,1.15-0.89,1.72c-0.32,0.58-0.64,1.14-0.96,1.68c-0.33,0.55-0.67,1.09-1.03,1.62c-0.35,0.52-0.71,1.04-1.09,1.56 c-0.38,0.51-0.77,1.01-1.17,1.5l-0.01,0.01c-0.41,0.5-0.83,0.99-1.26,1.46l-0.01,0.01c-0.44,0.48-0.88,0.94-1.32,1.39l-0.03,0.03 c-0.45,0.45-0.9,0.89-1.36,1.31c-0.47,0.42-0.95,0.84-1.44,1.25c-0.49,0.4-0.99,0.79-1.51,1.18c-0.52,0.38-1.04,0.75-1.57,1.1 c-0.53,0.36-1.07,0.71-1.62,1.04c-0.55,0.33-1.12,0.66-1.7,0.97c-0.57,0.31-1.15,0.6-1.73,0.89c-0.59,0.29-1.19,0.56-1.78,0.81 c-0.61,0.26-1.23,0.51-1.85,0.74c-0.62,0.23-1.25,0.44-1.89,0.64c-0.63,0.2-1.26,0.37-1.9,0.53c-0.63,0.16-1.28,0.31-1.95,0.44 c-0.66,0.13-1.31,0.25-1.97,0.35c-0.65,0.1-1.32,0.18-2,0.25c-1.36,0.13-2.72,0.2-4.1,0.2c-0.68,0-1.36-0.02-2.05-0.05 c-0.68-0.03-1.35-0.08-2.03-0.15c-0.68-0.07-1.35-0.15-2-0.25c-0.65-0.1-1.31-0.21-1.97-0.35c-0.64-0.12-1.28-0.27-1.91-0.43 c-0.63-0.16-1.26-0.34-1.88-0.53c-0.62-0.19-1.23-0.4-1.84-0.62c-0.61-0.22-1.22-0.47-1.83-0.72c-0.06-0.03-0.11-0.04-0.17-0.08 c-0.57-0.25-1.15-0.51-1.72-0.79c-0.58-0.28-1.15-0.57-1.7-0.87c-0.57-0.31-1.13-0.63-1.68-0.96c-0.57-0.34-1.13-0.69-1.67-1.05 c-0.52-0.35-1.04-0.71-1.55-1.09c-0.51-0.38-1.01-0.77-1.5-1.17c-0.5-0.41-0.99-0.83-1.47-1.27c-0.49-0.45-0.96-0.89-1.4-1.33 l-0.02-0.02c-0.45-0.45-0.89-0.9-1.31-1.37c-0.42-0.46-0.84-0.95-1.25-1.44c-0.4-0.49-0.8-1-1.18-1.52 c-0.38-0.51-0.75-1.04-1.1-1.57c-0.36-0.53-0.7-1.07-1.04-1.62c-0.33-0.55-0.66-1.12-0.97-1.7c-0.31-0.57-0.6-1.14-0.89-1.73 c-0.29-0.59-0.56-1.19-0.81-1.78c-0.26-0.61-0.51-1.23-0.74-1.85c-0.23-0.62-0.44-1.25-0.64-1.89c-0.2-0.63-0.37-1.26-0.53-1.9 c-0.16-0.63-0.31-1.28-0.44-1.95c-0.14-0.66-0.25-1.32-0.35-1.98c-0.1-0.65-0.18-1.31-0.25-1.99c-0.07-0.68-0.12-1.36-0.15-2.04 C0.02,84.14,0,83.46,0,82.78c0-1.37,0.07-2.73,0.2-4.08c0.07-0.68,0.15-1.34,0.25-2c0.1-0.65,0.21-1.31,0.35-1.98 c0.12-0.64,0.27-1.27,0.43-1.91c0.16-0.63,0.34-1.26,0.53-1.89c0.19-0.62,0.4-1.24,0.62-1.85c0.22-0.6,0.46-1.2,0.71-1.8 c0.02-0.06,0.03-0.08,0.06-0.14l0.03-0.05c0.25-0.59,0.52-1.18,0.8-1.76c0.28-0.58,0.58-1.15,0.89-1.72 c0.31-0.58,0.64-1.14,0.96-1.68c0.33-0.55,0.67-1.09,1.03-1.62c0.35-0.52,0.71-1.04,1.09-1.55c0.38-0.51,0.77-1.01,1.17-1.5 c0.41-0.5,0.83-0.98,1.26-1.46c0.44-0.49,0.89-0.96,1.34-1.41l0.02-0.02c0.45-0.45,0.91-0.89,1.37-1.32 c0.47-0.43,0.95-0.84,1.45-1.25c0.5-0.41,1-0.8,1.51-1.17l0.02-0.01c0.52-0.38,1.04-0.75,1.56-1.09c0.53-0.36,1.07-0.71,1.62-1.04 c0.55-0.33,1.12-0.66,1.7-0.97c0.56-0.31,1.14-0.6,1.73-0.88c0.59-0.29,1.19-0.56,1.78-0.81l0.02-0.01 c0.62-0.27,1.23-0.51,1.84-0.73c0.62-0.23,1.25-0.44,1.89-0.64c0.63-0.2,1.27-0.38,1.91-0.54c0.63-0.16,1.28-0.31,1.94-0.44 L32.06,43.47L32.06,43.47z M42.36,50.34v10.37h9.9c-0.61-0.78-1.26-1.56-1.93-2.35c-0.79-0.92-1.63-1.85-2.51-2.77 c-0.89-0.93-1.83-1.87-2.81-2.82C44.16,51.98,43.28,51.16,42.36,50.34L42.36,50.34z M42.36,65.23v15.29h18.82 c-0.12-1.18-0.32-2.36-0.6-3.55c-0.3-1.28-0.68-2.56-1.16-3.85c-0.49-1.32-1.07-2.65-1.74-3.98c-0.65-1.3-1.4-2.6-2.23-3.9H42.36 L42.36,65.23z M42.36,85.04v15.29h13.69c0.8-1.28,1.51-2.55,2.13-3.83c0.64-1.32,1.18-2.63,1.62-3.95 c0.43-1.29,0.77-2.59,1.02-3.88c0.23-1.21,0.38-2.41,0.45-3.62H42.36L42.36,85.04z M42.36,104.84v10.56 c0.98-0.82,1.92-1.65,2.83-2.48c1.04-0.95,2.03-1.9,2.97-2.84c0.94-0.95,1.82-1.89,2.66-2.83c0.71-0.8,1.39-1.61,2.03-2.41H42.36 L42.36,104.84z M37.84,115.4v-10.57H27.36c0.64,0.81,1.32,1.61,2.02,2.41c0.83,0.94,1.71,1.88,2.65,2.82 c0.94,0.95,1.93,1.89,2.97,2.84C35.9,113.75,36.85,114.57,37.84,115.4L37.84,115.4z M37.84,100.32V85.04H18.93 c0.07,1.21,0.23,2.41,0.46,3.62c0.25,1.3,0.59,2.59,1.03,3.89c0.44,1.32,0.98,2.64,1.62,3.95c0.62,1.28,1.32,2.56,2.12,3.83H37.84 L37.84,100.32z M37.84,80.52V65.23h-13.1c-0.83,1.3-1.57,2.6-2.23,3.9c-0.67,1.33-1.25,2.66-1.74,3.98 c-0.47,1.29-0.86,2.57-1.16,3.85c-0.28,1.19-0.47,2.37-0.6,3.55H37.84L37.84,80.52z M37.84,60.72V50.34 c-0.92,0.82-1.8,1.63-2.64,2.44c-0.99,0.94-1.93,1.89-2.82,2.82c-0.88,0.92-1.72,1.85-2.51,2.77c-0.67,0.78-1.32,1.57-1.93,2.35 H37.84L37.84,60.72z M85.61,64.33h19.93c1.1,0,1.99,0.97,1.99,2.16c0,1.19-0.89,2.16-1.99,2.16h-18.4 C86.7,67.18,86.19,65.74,85.61,64.33L85.61,64.33z M80.55,54.94c0.16-0.05,0.33-0.07,0.51-0.07h24.48c1.1,0,1.99,0.97,1.99,2.16 c0,1.19-0.89,2.16-1.99,2.16H83.18C82.37,57.73,81.5,56.31,80.55,54.94L80.55,54.94z M47.55,24.17h59.75v23.39H74.32 c-7.16-6.96-16.43-11.75-26.77-13.33V24.17L47.55,24.17z M70.16,6.75c1.87,0,3.39,1.52,3.39,3.39c0,1.87-1.52,3.39-3.39,3.39 s-3.39-1.52-3.39-3.39C66.77,8.27,68.29,6.75,70.16,6.75L70.16,6.75z M58.3,6.75c1.87,0,3.39,1.52,3.39,3.39 c0,1.87-1.52,3.39-3.39,3.39c-1.87,0-3.39-1.52-3.39-3.39C54.9,8.27,56.42,6.75,58.3,6.75L58.3,6.75z M46.43,6.75 c1.87,0,3.39,1.52,3.39,3.39c0,1.87-1.52,3.39-3.39,3.39c-1.87,0-3.39-1.52-3.39-3.39C43.04,8.27,44.56,6.75,46.43,6.75L46.43,6.75 z" />
                                        </g>
                                    </svg>
                                </i>
                            </div>
                        </div>
                        <div class="sm:pl-4 pl-1 w-full">
                            <div>
                                <h2 class="text-white text-xl text-center font-extrabold">
                                    {{ count($vendorDomain) }}
                                </h2>
                                <h2 class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                    Total Vendor
                                </h2>
                            </div>
                        </div>
                    </div>
                </button>
                <x-modal.showVendorDomain :vendor="$vendorDomain">
                </x-modal.showVendorDomain>
                <button
                    class="group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-[85.33px] lg:hidden block">
                    <a href="{{ route('invoice') }}" class="h-full">
                        <div
                            class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500 h-full">
                            <div>
                                <div
                                    class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                    <i class="fa-solid text-white fa-file"></i>
                                </div>
                            </div>
                            <div class="sm:pl-4 pl-1 w-full">
                                <div>
                                    <h2
                                        class="text-gray-300 text-sm sm:text-base font-extrabold text-center whitespace-nowrap">
                                        Buat Invoice
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
            <div class="flex xl:flex-row flex-col-reverse xl gap-3">
                <div class="w-full mx-auto space-y-3">
                    {{-- Bar Chart --}}
                    {{-- <div class="dark:bg-gray-800 bg-blue-900 rounded-lg w-[95%] mx-auto">
                        <div class="w-full flex justify-end">
                            <select name="year" id="inputYears"
                                class="text-xs rounded-lg dark:bg-gray-800 bg-blue-900 text-white">
                                <option value="" selected disabled>Select Years</option>
                                @foreach ($year as $years)
                                    <option value="{{ $years }}">{{ $years }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <canvas id="barChart" width="400" height="200"></canvas>
                        </div>
                    </div> --}}
                    <div class="flex flex-col lg:flex-row gap-2 mb-3">
                        {{-- Expired Table --}}
                        <div
                            class="dark:bg-gray-800 bg-blue-900 rounded-lg mx-auto w-full lg:h-full border dark:border-gray-300 border-gray-400">
                            <div
                                class="text-white bg-blue-800 dark:bg-gray-600 rounded-t-lg text-sm flex justify-between items-center h-[36px] px-3">
                                <select id="expiryType"
                                    class="py-1 text-xs pl-3 pr-7 dark:bg-white border dark:text-black h-min border-gray-300 bg-white text-black border-none rounded focus:ring-0 dark:hover:bg-gray-200">
                                    <option selected value="expired"> Domain Expired</option>
                                    <option value="soon"> Soon Expired</option>
                                </select>
                                <select id="expiryRange"
                                    class="py-1 text-xs pl-3 pr-7 dark:bg-white border dark:text-black h-min border-gray-300 bg-white text-black border-none rounded focus:ring-0 dark:hover:bg-gray-200"
                                    style="display: none">
                                    <option value="30" selected> 30 Hari</option>
                                    <option value="60"> 60 Hari</option>
                                    <option value="90"> 90 Hari</option>
                                </select>
                            </div>
                            <div class="p-2">
                                <div
                                    class="relative overflow-x-auto shadow-md rounded-lg dark:bg-gray-800 bg-blue-100">
                                    <table
                                        class="table-expired w-full text-sm text-left text-gray-800 bg-blue-100 dark:bg-gray-800 dark:text-gray-400">
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- Donut Chart --}}
                        <div class=" border dark:border-gray-300 border-gray-400 rounded-xl overflow-hidden lg:min-w-[300px] w-full  bg-blue-900 dark:bg-gray-800 h-full"
                            id="donut-chart">
                            <div class="p-2 text-white bg-blue-800 dark:bg-gray-600 rounded-t-lg text-sm">Daftar Domain
                            </div>
                            <div class="donut-chart-container relative text-center p-2">
                                <canvas id="myDonutChart" class="mx-auto"></canvas>
                                <div class="donut-chart-total absolute top-[40%] w-full -ml-2 text-white">
                                    <div class="text-xs font-extrabold">Total</div>
                                    <span id="totalValue" class="text-3xl font-extrabold"></span>
                                    <div class="text-sm font-extrabold">Domain</div>
                                </div>
                            </div>
                        </div>
                        {{-- Todo Table --}}
                        @include('master.dashboard.todo-table')
                    </div>
                </div>
                {{-- <div class="space-y-3 dark:bg-gray-800 bg-blue-900 rounded-lg p-2 h-min w-1/2">
                    <div class="flex md:flex-row flex-col justify-center items-center gap-2"> --}}

                {{-- Pie Chart --}}
                {{-- <div class=" border dark:border-gray-300 border-gray-400 rounded-xl overflow-hidden max-w-[300px]"
                            id="donut-chart-label">
                            <div class="p-2 text-white bg-blue-800 dark:bg-gray-600 rounded-t-lg text-sm">Daftar Label
                                Domain</div>
                            <div class="donut-chart-container relative text-center p-2 bg-blue-100 dark:bg-gray-800">
                                <canvas id="myDonutChartLabel" class="mx-auto"></canvas>
                            </div>
                        </div> --}}
                {{-- </div>
                </div> --}}
            </div>
        @else
            <div class="space-y-2 py-2">
                <div id="marqueeContainer">
                    <div id="quotes" class="text-white">{!! $quotes !!}</div>
                </div>
                <div class="md:grid grid-cols-2 gap-3 md:space-y-0 space-y-3">
                    {{-- Pie Chart --}}
                    {{-- <div class="">
                        <div class=" border dark:border-gray-300 border-gray-400 rounded-xl overflow-hidden "
                            id="donut-chart-label">
                            <div class="p-2 text-white bg-blue-800 dark:bg-gray-600 rounded-t-lg text-sm">Daftar Label
                                Domain</div>
                            <div class="donut-chart-container relative text-center p-2 bg-blue-100 dark:bg-gray-800">
                                <canvas id="myDonutChartLabel" class="mx-auto"></canvas>
                            </div>
                        </div>
                    </div> --}}
                    <div class=" border rounded-lg w-full overflow-hidden">
                        <div class="p-2 bg-gray-600 rounded-t-lg text-white text-sm">
                            <p>Leaderboards</p>
                        </div>
                        <div class="text-white space-y-2 p-2 h-[420px] overflow-auto">
                            @php
                                require_once app_path('Helpers/NumberHelper.php');

                                usort($dataPoint, function ($a, $b) {
                                    return $b['totalPoints'] <=> $a['totalPoints'];
                                });

                                $indexPoint = 0;
                            @endphp
                            @foreach ($dataPoint as $point)
                                <div class="flex items-center border rounded-lg justify-between px-5 py-2 bg-gray-700">
                                    <div class="flex gap-3 items-center">
                                        <p>
                                            {{ numberToOrdinal($indexPoint + 1) }}
                                        </p>
                                        <div class="border rounded-full">
                                            @if ($point['user']->image == null)
                                                @php
                                                    $nameParts = explode(' ', $point['user']->name);
                                                    $initials = '';
                                                    foreach ($nameParts as $part) {
                                                        $initials .= strtoupper(substr($part, 0, 1));
                                                    }
                                                @endphp
                                                <div
                                                    class="w-16 h-16 bg-gray-500 flex items-center justify-center rounded-full">
                                                    <span class="text-white text-2xl">{{ $initials }}</span>
                                                </div>
                                            @else
                                                <img src="{{ asset('storage/images/fotoProfil') }}/{{ $point['user']->image }}"
                                                    class="w-16 h-16 object-cover rounded-full" alt="">
                                            @endif
                                        </div>

                                        <p>
                                            {{ $point['user']->name }}
                                        </p>
                                    </div>
                                    <p>
                                        {{ $point['totalPoints'] }}
                                    </p>
                                </div>
                                @php
                                    $indexPoint++;
                                @endphp
                            @endforeach


                        </div>
                    </div>
                    {{-- Todo Table --}}
                    @include('master.dashboard.todo-table')
                </div>
            </div>
        @endif
    </div>

</x-app-layout>
<script>
    const aktif = {!! $activeCountsJson !!};
    const soon = {!! $countSoonExpiredJson !!};
    const expired = {!! $expiredCountJson !!};
    const total = {!! $totalDomainJson !!};
    const modalAktifEl = document.getElementById('activeDomain');
    const modalExpiredEl = document.getElementById('expiredDomain');
    const modalSoonExpiredEl = document.getElementById('expiredSoon');
    const modalAktif = new Modal(modalAktifEl);
    const modalExpired = new Modal(modalExpiredEl);
    const modalSoonExpired = new Modal(modalSoonExpiredEl);

    var totalValue = document.getElementById('totalValue');

    const data = {
        labels: ["Domain Aktif", "Expired Soon", "Domain Expired"],
        datasets: [{
            data: [aktif, soon, expired],
            backgroundColor: ["#5733FF", "#f6ff00", "#ff0000"]
        }]
    };

    // Membuat Donut Chart
    const ctx = document.getElementById("myDonutChart").getContext("2d");

    const myDonutChart = new Chart(ctx, {
        type: "doughnut",
        data: data,
        options: {
            responsive: true,
            cutoutPercentage: 70,
            animation: {
                animateRotate: true
            },
            plugins: {
                legend: {
                    display: false
                },
                labels: {
                    render: 'percentage',
                }
            },
            onClick: function(event, elements) {
                if (elements.length > 0) {
                    const index = elements[0].index;
                    const label = data.labels[index];

                    switch (label) {
                        case "Domain Aktif":
                            const btnHideActive = document.getElementById('btn-hide-active');
                            modalAktif.show();
                            btnHideActive.addEventListener('click', function() {
                                modalAktif.hide();
                            });
                            break;
                        case "Expired Soon":
                            const btnHideSoonExpired = document.getElementById('btn-hide-soon-expired');
                            modalSoonExpired.show();
                            btnHideSoonExpired.addEventListener('click', function() {
                                modalSoonExpired.hide();
                            });
                            break;
                        case "Domain Expired":
                            const btnHideExpired = document.getElementById('btn-hide-expired');
                            modalExpired.show();
                            btnHideExpired.addEventListener('click', function() {
                                modalExpired.hide();
                            });
                            break;
                        default:
                            url = 'URL_Default';
                            break;
                    }
                }
            }
        }
    });


    totalValue.textContent = total;
</script>
<script>
    const ctxl = document.getElementById("myDonutChartLabel").getContext("2d");
    const labels = {!! $labelsJson !!};
    const domains = {!! $domainsJson !!};
    const labelIds = {!! $labelsIdJson !!};
    const labelColors = {!! $labelColorsJson !!};
    const dataLabel = {
        labels: labels,
        datasets: [{
            label: 'Jumlah Domain',
            data: domains,
            backgroundColor: labels.map((label, index) => labelColors[index] || 'rgba(255, 99, 132, 0.2'),
            borderColor: [
                '#ffffff'
            ],
            borderWidth: 1,
        }]
    };
    const legendCallback = function(chart) {
        const legendItems = chart.data.datasets.map((dataset, index) => {
            return `
      <div class="legend-item">
        <span class="legend-color" style="background-color:${dataset.backgroundColor}"></span>
        <span class="legend-label">${dataset.label}</span>
      </div>
    `;
        });

        return legendItems.join('');
    };
    const myChart = new Chart(ctxl, {
        type: 'pie',
        data: dataLabel,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                }
            },
            onClick: function(event, elements) {
                if (elements.length > 0) {
                    const clickedIndex = elements[0].index;

                    const clickedLabelId = labelIds[clickedIndex];

                    window.location.href = `/labelDomain/${clickedLabelId}`;
                }
            }
        }
    });
    const customLegend = document.getElementById('custom-legend');
    customLegend.innerHTML = myChart.generateLegend();
</script>
<script>
    const inputYear = document.getElementById('inputYears');
    const ctxb = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctxb, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                    label: 'Domain Expired',
                    data: {!! json_encode($barExpired) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.5)'
                },
                {
                    label: 'Domain Aktif',
                    data: {!! json_encode($barActive) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }, {
                    label: 'Domain Baru',
                    data: {!! json_encode($barNew) !!},
                    backgroundColor: 'rgba(0, 249, 0, 0.8)'
                }
            ]
        },
        options: {
            plugins: {
                datalabels: {
                    color: '#ffffff',
                    font: {
                        size: 14,
                        weight: 'bold'
                    },
                },
                legend: {
                    display: false,
                }
            },
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white',
                        font: {
                            size: 12,
                        },
                    },
                },
                x: {
                    ticks: {
                        color: 'white',
                        font: {
                            size: 12,
                        },
                    },
                },
            }
        }
    });

    inputYear.addEventListener('change', function() {
        const selectedYear = inputYear.value;
        fetch(`/barchart?year=${selectedYear}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                barChart.data.datasets[0].data = data.barExpired;
                barChart.data.datasets[1].data = data.barActive;
                barChart.data.datasets[2].data = data.barNew;

                barChart.update();
            })
            .catch(error => {
                console.error('Terjadi kesalahan saat mengambil data:', error);
            });
    });

    function updateChartLabels(chart, labels) {
        chart.data.labels = labels;
        chart.update();
    }
    window.addEventListener('DOMContentLoaded', function() {
        var elipsisLabels = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
            "Dec"
        ];

        var responsiveChart = window.matchMedia(
            '(max-width: 640px)');

        if (responsiveChart.matches) {
            updateChartLabels(barChart, elipsisLabels);
        }
        responsiveChart.addListener(function(event) {
            if (event.matches) {
                updateChartLabels(barChart, elipsisLabels);
            } else {
                updateChartLabels(barChart, data.labels);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.table-expired').DataTable({
            info: false,
            paging: false,
            searching: false,
            ordering: false,
            processing: true,
            scrollY: 300,
            deferRender: true,
            "drawCallback": function(settings) {
                $(".table-expired thead").remove();
            },
            scroller: true,
            ajax: {
                url: '/get/domain/expired',
                dataSrc: '',
            },
            columns: [{
                    data: 'nama_domain',
                    render: function(data, type, full, meta) {
                        return '<div class="flex gap-2 items-center"><a href="//wa.me/' + full
                            .pelanggan.no_hp +
                            '"><i class="fa-brands fa-whatsapp text-green-500 fa-lg"></i></a><a href="/domain/' +
                            full.slug + '"><p>' +
                            data + '</p></a></div>';
                    }
                },
                {
                    data: 'tanggal_expired',
                    render: function(data, type, full, meta) {
                        var today = new Date();
                        var expiryThreshold = new Date();
                        var tanggal_expired = new Date(data);

                        var options = {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        };
                        var formattedTanggalExpired = tanggal_expired.toLocaleDateString(
                            'id-ID', options);

                        return formattedTanggalExpired;
                    }
                },
            ],
        });

        const selectTable = document.getElementById('expiryType');
        const expiredRange = document.getElementById('expiryRange');


        selectTable.addEventListener('change', function() {
            const selectedValue = selectTable.value;
            const tbodyExpired = document.getElementById('tbodyExpired');

            if (selectedValue === 'expired') {
                table.ajax.url('/get/domain/expired').load();
                expiredRange.style.display = 'none';
            } else if (selectedValue === 'soon') {
                table.ajax.url('/get/domain/expiredSoon/' + expiredRange.value).load();
                expiredRange.style.display = 'block';
            }
        });


        expiredRange.addEventListener('change', function() {
            const expiredRangeValue = expiredRange.value;
            table.ajax.url('/get/domain/expiredSoon/' + expiredRange.value).load();
        });

    });
</script>
<script>
    $(document).ready(function() {
        var owl;

        function initializeOwlCarousel() {
            owl = $(".owl-carousel").owlCarousel({
                stagePadding: 50,
                margin: 20,
                loop: true,
                responsive: {
                    0: {
                        items: 2,
                        margin: 10,
                        stagePadding: 15
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });
        }

        function destroyOwlCarousel() {
            if (owl) {
                owl.trigger('destroy.owl.carousel');
            }
        }

        function checkWidth() {
            if (window.innerWidth <= 1024) {
                initializeOwlCarousel();
            } else {
                destroyOwlCarousel();
            }
        }

        checkWidth();
        window.addEventListener('resize', checkWidth);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const selectTodo = document.getElementById('selectTodo');
        const todoItems = document.querySelectorAll('.todo-item');

        const filterTodoItems = () => {
            const selectedValue = selectTodo.value;

            todoItems.forEach((item) => {
                const status = item.getAttribute('data-status');
                if (selectedValue === status) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        };

        filterTodoItems();
        selectTodo.addEventListener('change', filterTodoItems);
    });
</script>
<script>
    setTimeout(function() {
        var alertUrgent = document.querySelector('.alertUrgent');
        alertUrgent.style.display = 'none';
    }, 3000);
</script>
<script>
    function updateQuote() {
        $.ajax({
            url: '/dashboard/quotes',
            method: 'GET',
            success: function(data) {
                $('#quotes').html(data);
            },
            error: function(error) {
                console.log('Error fetching new quote: ' + error);
            }
        });
    }

    $(document).ready(function() {
        $('#quotes').on('animationiteration', function() {
            updateQuote();
        });
    });
</script>
