<x-app-layout title="Label Domain">
    <div class="mx-10 py-10">
        <div class="flex items-center my-2">
            <button type="button"
                class="p-2 text-sm  bg-blue-900 dark:bg-gray-700 rounded-lg border border-gray-600 text-gray-300"
                data-modal-target="labelModal" data-modal-toggle="labelModal">Tambah Label</button>
        </div>
        @include('components.modal.addLabelDomain')
        <div class="rounded-lg overflow-x-auto">
            <table class="w-full text-xs sm:text-sm text-left text-gray-400" id="labelDomainTable">
                <thead
                    class="text-xs sm:uppercase bg-blue-900 dark:bg-gray-700 text-white dark:text-gray-200 text-center whitespace-nowrap">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Label
                        </th>
                        {{-- <th scope="col" class="px-6 py-3 text-center">
                            Daftar Domain
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($label as $item)
                        <tr
                            class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                            <th scope="row"
                                class=" font-medium text-gray-900 whitespace-nowrap dark:text-white text-start px-3">
                                <div class="flex gap-3">
                                    <button data-modal-target="addLabelDomainModal-{{ $item->id }}"
                                        data-modal-toggle="addLabelDomainModal-{{ $item->id }}"
                                        class="block rounded-full text-white dark:text-black w-5 h-5 text-center bg-orange-700 dark:bg-gray-300">
                                        +
                                    </button>
                                    <div class="flex gap-3 items-center">
                                        <i class="fa-solid fa-tag" style="color: {{ $item->color }}"></i>
                                        <a href="{{ route('labelDomain.show', ['labelDomain' => $item->id]) }}"
                                            class="capitalize">{{ $item->name }}</a>
                                    </div>
                                </div>
                            </th>

                            {{-- <th scope="row"
                                class=" font-medium text-gray-900 whitespace-nowrap dark:text-white text-start px-3">

                                <div class="flex justify-center items-center">
                                    <button id="domainLabel-{{ $item->id }}"
                                        data-dropdown-toggle="domainL-{{ $item->id }}"
                                        class="domainDropdown dark:text-white text-black font-medium rounded-lg  text-xs sm:text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">Lihat Daftar Domain <svg class="w-2.5 h-2.5 ml-2.5"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg></button>


                                    <!-- Dropdown menu -->
                                    <div id="domainL-{{ $item->id }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 border-blue-900 dark:border-white border">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="domainLabel-{{ $item->id }}">
                                            @if ($item->domain->isEmpty())
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sm sm:text-xs">Tidak
                                                        ada Domain</a>
                                                </li>
                                            @else
                                                @foreach ($item->domain as $items)
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 text-sm sm:text-xs dark:hover:bg-gray-600 dark:hover:text-white lg:min-w-[200px]">{{ $items->nama_domain }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </th> --}}
                            <x-modal.addLabelDomainModal :sublabel="$subLabel" :domain="$domain" :label="$item->domain"
                                name="{{ $item->name }}" id="{{ $item->id }}" />
                            <td class="">
                                <div class="flex gap-3 justify-center">
                                    <a href="{{ route('labelDomain.edit', $item->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <div>
                                        <form action="{{ route('labelDomain.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
<script>
    $(document).ready(function() {
        const labelDomainTable = $('#labelDomainTable').DataTable({
            lengthChange: false,
            deferRender: true,
            scroller: true,
            info: false,
            paging: false,
            responsive: true,
            columnDefs: [{
                    responsivePriority: 0,
                    targets: 0
                },
                {
                    orderable: false,
                    targets: 1
                }
            ]
        });
    });
</script>
