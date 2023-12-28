@props(['vendor' => '[]'])
<div id="showVendorDomain" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="sm:text-xl text-lg font-semibold text-gray-900 dark:text-white leading-none">
                        Daftar Vendor
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="showVendorDomain">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="sm:mx-10 mx-2 pb-5">
                @if (count($vendor) > 0)
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($vendor as $item)
                            <button id="btn-hide-vendor" data-id="{{ $item->id }}"
                                class="showVendorDomain group hover:scale-110 transition ease-out duration-1000 xl:col-span-1 col-span-1 w-full h-24">
                                <a href="{{ route('vendor.show', $item->id) }}">
                                    <div
                                        class="w-full rounded-lg dashItem dark:bg-gray-600 bg-blue-900 flex items-center py-5 px-4 border border-gray-400 duration-500">
                                        <div>
                                            <div
                                                class="xl:w-12 xl:h-12 w-7 h-7 text-xs sm:text-sm group-hover:animate-bounce duration-1000 motion-reduce:animate-bounce bg-[#ff8600] dark:bg-gray-800 border border-gray-400 rounded-full flex justify-center items-center">
                                                <i class="fill-white">
                                                    <svg version="1.1" id="Layer_1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 120.74 122.88" class="w-[15px]"
                                                        style="enable-background:new 0 0 120.74 122.88"
                                                        xml:space="preserve">
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
                                                    {{ count($item->domain) }}
                                                </h2>
                                                <h2
                                                    class="text-gray-300 text-xs sm:text-sm text-center whitespace-nowrap">
                                                    {{ $item->vendor }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </button>
                        @endforeach
                    </div>
                @else
                    <div class="border border-gray-300 p-3 dark:text-white rounded-lg mt-3">
                        Tidak Ada Vendor
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
