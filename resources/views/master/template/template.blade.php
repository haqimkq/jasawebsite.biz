<x-app-layout title="Template Website">
    <div class="relative">
        @if (session('successs'))
            <div class="absolute top-[70px] w-full">
                <div class="alertSuccess bg-green-200 text-green-800 px-4 py-3 rounded relative mx-3">
                    {{ session('successs') }}
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500 close-btn2" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif
        @if (session('errorss'))
            <div class="absolute top-[70px] w-full">
                <div class="alertSuccess bg-red-200 text-red-800 px-4 py-3 rounded relative mx-3">
                    {{ session('errorss') }}
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500 close-btn2" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif
        <div class="bg-whois h-screen px-3 -mt-[64.67px] flex items-center justify-center">
            <div class="space-y-5 ">
                <div class="flex justify-center">
                    <p class="text-white text-center text-4xl w-2/3 font-extrabold">Setiap Ide Hebat Dimulai dengan Nama
                        Domain yang Hebat
                    </p>
                </div>
                <form action="{{ route('lookup') }}" method="GET">
                    @csrf
                    <div class="w-full flex gap-3">
                        <input type="text" class="w-full rounded-lg" name="domain"
                            placeholder="Cek Nama Domain Yang Anda Inginkan">
                        <button class="whitespace-nowrap bg-gray-700 rounded-lg text-white p-3" type="submit">Cek
                            Domain</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="mt-10 px-10 w-full">
        {{-- <div class="grid md:grid-cols-4 grid-flow-row gap-4 place-items-center">
            @foreach ($template as $item)
                @php
                    $number = $item->harga;
                    $formattedNumber = number_format($number, 0, ',', '.');
                @endphp

                <div class="flex justify-center">
                    <div
                        class="border dark:border-gray-600 border-blue-700 rounded-lg w-64 h-[340px] bg-white drop-shadow-xl dark:drop-shadow-[0_13px_13px_rgba(255,255,255,0.25)] relative">
                        <div class="h-52">
                            <button data-modal-target="showTemplate-{{ $item->id }}"
                                data-modal-toggle="showTemplate-{{ $item->id }}">
                                <img class=" max-w-full rounded-t-lg"
                                    src="{{ asset('storage/images/template') }}/{{ $item->image }}" alt="">
                            </button>

                        </div>
                        <p class="text-xl font-extrabold text-center">{{ $item->nama_template }}</p>
                        <div
                            class="mb-3 flex justify-center absolute bottom-0 left-1/2 right-1/2 w-auto whitespace-nowrap">
                            <button data-modal-target="showTemplate-{{ $item->id }}"
                                data-modal-toggle="showTemplate-{{ $item->id }}"
                                class="p-3 dark:bg-gray-800  text-white bg-blue-500 rounded-xl text-sm">
                                <i class="fa-solid fa-cart-shopping mr-2 dark:text-white"></i>
                                Rp. {{ $formattedNumber }}
                            </button>
                        </div>
                    </div>
                </div>

                <x-modal.showTemplate id='{{ $item->id }}' image='{{ $item->image }}' link='{{ $item->link }}'
                    nama_template='{{ $item->nama_template }}'>
                </x-modal.showTemplate>
            @endforeach
        </div> --}}
    </div>

</x-app-layout>
