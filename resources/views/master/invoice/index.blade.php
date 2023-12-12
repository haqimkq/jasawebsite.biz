<x-app-layout>

    <div class="mx-10 py-20">
        <div class="rounded-lg overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-400">
                <thead
                    class="text-xs uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 whitespace-nowrap">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            Type Invoice
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Nama Penerima
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Berita
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nomor Invoice
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice as $item)
                        <tr
                            class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                Invoice Umum
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                {{ $item->nama }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                <ul>
                                    @foreach ($item->item as $items)
                                        <li>
                                            - {{ $items->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </th>
                            <th scope="row"
                                class="text-start px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nomor_invoice }}
                            </th>
                            <x-modal.showPdf file='{{ $item->file }}'>
                            </x-modal.showPdf>
                            <td class="px-6 py-4 flex gap-3 items-center justify-center">
                                <button data-modal-target="showPdf-{{ $item->file }}"
                                    data-modal-toggle="showPdf-{{ $item->file }}">
                                    <i class=" dark:text-white text-gray-600 fa-solid fa-file"></i>
                                </button>
                                <form action="{{ route('invoiceDelete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline"><i
                                            class="fa-solid fa-delete-left"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($pelanggan as $item)
                        <tr
                            class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                            <th scope="row" class="px-6 py-4 font-medium text-red-700 whitespace-nowrap  text-start">
                                Invoice Pelanggan
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                {{ $item->nama_penerima }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                <ul>
                                    @foreach ($item->item as $items)
                                        <li>
                                            - {{ $items->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </th>
                            <th scope="row"
                                class="text-start px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nomor_invoice }}
                            </th>
                            <x-modal.showPdf file='{{ $item->file }}'>
                            </x-modal.showPdf>
                            <td class="px-6 py-4 flex justify-center items-center gap-3">
                                <button data-modal-target="showPdf-{{ $item->file }}"
                                    data-modal-toggle="showPdf-{{ $item->file }}">
                                    <i class=" dark:text-white text-gray-600 fa-solid fa-file"></i>
                                </button>
                                <form action="{{ route('invoicePelangganDelete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline"><i
                                            class="fa fa-delete-left"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($domain as $item)
                        <tr
                            class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                            <th scope="row" class="px-6 py-4 font-medium text-blue-700 whitespace-nowrap text-start">
                                Invoice Domain
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                {{ $item->nama_penerima }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                <ul>
                                    @foreach ($item->item as $items)
                                        <li>
                                            - {{ $items->keterangan }}
                                        </li>
                                    @endforeach
                                </ul>
                            </th>
                            <th scope="row"
                                class="text-start px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nomor_invoice }}
                            </th>
                            <x-modal.showPdf file='{{ $item->file }}'>
                            </x-modal.showPdf>
                            <td class="px-6 py-4 flex justify-center items-center gap-3">
                                <button data-modal-target="showPdf-{{ $item->file }}"
                                    data-modal-toggle="showPdf-{{ $item->file }}">
                                    <i class=" dark:text-white text-gray-600 fa-solid fa-file"></i>
                                </button>
                                <form action="{{ route('invoiceDomainDelete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline"><i
                                            class="fa fa-delete-left"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
