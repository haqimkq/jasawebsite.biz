@php
    use Carbon\Carbon;
@endphp
<div id="showExpiredDomain" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="sm:text-xl text-lg font-semibold text-gray-900 dark:text-white leading-none">
                        Expired Soon Domain
                    </h3>
                    <span class="text-xs leading-none text-gray-500">*expired in 2 months</span>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="showExpiredDomain">
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
                <div class="rounded-lg overflow-x-auto shadow-md shadow-gray-800">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead
                            class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Domain
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Expired
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($domains as $item)
                                @if ($item->tanggal_expired <= $expiryThreshold)
                                    @php
                                        $expirationDate = Carbon::parse($item->tanggal_expired);
                                        $remainingDays = $expirationDate->diffInDays($td);
                                        if ($expirationDate < $td) {
                                            $remainingDays = -$remainingDays;
                                        }
                                    @endphp
                                    <tr
                                        class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                            <a class="text-blue-500"
                                                href="{{ route('domain.edit', $item->id) }}">{{ $item->nama_domain }}</a>
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                            {{ $item->tanggal_expired }} <span class="text-gray-400 text-xs">(
                                                Remaining:
                                                {{ $remainingDays }} days )
                                            </span> </th>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
