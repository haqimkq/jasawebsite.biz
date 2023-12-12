@props(['id' => null, 'domain' => '[]', 'label' => '[]', 'name' => '', 'sublabel' => '[]'])

<div id="addLabelDomainModal-{{ $id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 border-white border">
            <!-- Modal header -->
            <div
                class="flex items-start justify-between p-2 border-b dark:border-white bg-blue-900 dark:bg-gray-600 rounded-t-lg">
                <h3 class="text-xl font-semibold text-white">
                    {{ $name }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="addLabelDomainModal-{{ $id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="my-10 flex justify-center sm:p-0 p-3">
                <div class=" max-w-xl sm:min-w-[576px] ">
                    <form class="w-full space-y-2" method="POST" action="{{ route('labels.labelDomain', $id) }}">
                        @csrf
                        <div>
                            <label for="domains[]">
                                <p class="text-white">Nama Domain :</p>
                                <select name="domains[]" id="domainSelect-{{ $id }}"
                                    class="js-example-basic-multiple" style="width: 100% !important" multiple>
                                    @foreach ($domain as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_domain }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div>
                            <label for="sublabels[]">
                                <p class="text-white">Sub Label :</p>
                                <select name="sublabels[]" class="js-example-basic-multiple"
                                    style="width: 100% !important" multiple>
                                    @foreach ($sublabel as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="flex justify-end mt-3">
                            <div
                                class="px-3 py-2 dark:bg-white bg-blue-900 text-white dark:text-gray-800 rounded-lg font-extrabold text-sm tracking-widest">
                                <button type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
