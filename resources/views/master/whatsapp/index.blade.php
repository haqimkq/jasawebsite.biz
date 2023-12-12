<x-app-layout title="Nomor Whatsapp">
    <div class="mx-10 py-10">
        <div class="flex items-center my-2">
            <button type="button"
                class="p-2 text-sm  bg-blue-900 dark:bg-gray-700 rounded-lg border border-gray-600 text-gray-300"
                data-modal-target="addWa" data-modal-toggle="addWa">Tambah Template</button>
        </div>
        @include('components.modal.addWa')
        <div class="rounded-lg overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-400">
                <thead
                    class="text-xs uppercase bg-blue-900 dark:bg-gray-600 text-white dark:text-gray-200 text-center whitespace-nowrap">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Template
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Daftar Nomor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Click
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wa as $item)
                        <tr
                            class="dark:hover:bg-gray-700 hover:bg-gray-300 border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start">
                                <ul>
                                    @foreach ($item->number as $items)
                                        <li>{{ $items->number }}</li>
                                    @endforeach
                                </ul>
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <ul>
                                    @php
                                        $totalClickCount = \App\Models\WaNumber::where('whatsapp_id', $item->id)->sum('click_count');
                                    @endphp
                                    <li>
                                        <button data-modal-target="showNumber-{{ $item->id }}"
                                            data-modal-toggle="showNumber-{{ $item->id }}">{{ $totalClickCount }}</button>
                                        <x-modal.showNumber :number="$item->number" :id="$item->id" :name="$item->nama">
                                        </x-modal.showNumber>

                                    </li>
                                </ul>
                            </th>
                            <td class="px-6 py-4">
                                <div class="flex gap-3 justify-center">
                                    <a id="copyLink" href="{{ route('random.whatsapp', $item->nama) }}"
                                        class="font-medium hover:underline"></a>
                                    <button id="copyButton"><i class="fa-solid fa-lg fa-copy"></i></button>
                                    <a href="{{ route('whatsapp.edit', $item->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                            class=" fa-solid fa-lg fa-pen-to-square"></i></a>
                                    <div>
                                        <form action="{{ route('whatsapp.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fa-solid fa-lg fa-delete-left text-red-500"></i>
                                            </button>
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
    <script>
        const copyButton = document.getElementById("copyButton");
        const copyLink = document.getElementById("copyLink");

        copyButton.addEventListener("click", function() {
            // Membuat elemen input sementara untuk menyalin teks
            const tempInput = document.createElement("input");
            tempInput.value = copyLink.href;
            document.body.appendChild(tempInput);

            // Memilih teks dalam elemen input
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Untuk dukungan peramban yang beragam

            // Menyalin teks ke papan klip
            document.execCommand("copy");

            // Menghapus elemen input sementara
            document.body.removeChild(tempInput);

            alert("Tautan berhasil disalin: " + copyLink.href);
        });
    </script>

</x-app-layout>
