<x-app-layout title="Edit Label Domain">
    <div class=" my-10 flex justify-center sm:p-0 p-3">
        <div
            class="dark:bg-gray-600 max-w-xl sm:min-w-[576px] w-full rounded-lg border-gray-700 dark:border-white border">
            <div class="dark:bg-gray-900 bg-blue-900 rounded-t-lg p-3 text-white">
                <p>{{ $domain->nama_domain }}</p>
            </div>

            <div class="px-3 sm:flex justify-between">
                <h3 class=" font-semibold text-gray-900 dark:text-white my-3 text-2xl">Daftar Label</h3>
                <div class="flex items-center my-2">
                    <button type="button"
                        class="p-2 text-sm  bg-blue-900 dark:bg-gray-700 rounded-lg border border-gray-600 text-gray-300"
                        data-modal-target="labelModal" data-modal-toggle="labelModal">Tambah Label</button>
                </div>
                @include('components.modal.addLabelDomain')
            </div>
            <div class="px-3 pb-3 flex justify-center gap-3">
                <form class="w-full" method="POST" action="{{ route('domains.storeLabel', $domain->id) }}">
                    @csrf
                    <ul
                        class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach ($label as $labels)
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox-{{ $labels->id }}" type="checkbox" name="labels[]"
                                        value="{{ $labels->id }}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"@if ($domain->label->contains($labels->id)) checked @endif>
                                    <label for="vue-checkbox-{{ $labels->id }}"
                                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $labels->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="flex justify-end mt-3">
                        <div
                            class="px-3 py-2 dark:bg-white bg-blue-900 dark:text-gray-800 text-white rounded-lg font-extrabold text-sm tracking-widest">
                            <button type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
                <div class="">
                    @foreach ($label as $labels)
                        <form action="{{ route('labelDomain.destroy', $labels->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button type="submit" title="Delete"
                                    class="w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <i class="fa-solid fa-delete-left text-white">
                                    </i></button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
