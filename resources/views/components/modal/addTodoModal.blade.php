@props(['domain' => [], 'label' => [], 'sublabel' => []])

<div id="addTodo" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-2 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 border-white border">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Buat Todo
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="addTodo">
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
            <div class="p-5">
                <form action="{{ route('todos.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <label for="domain"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Domain</label>
                                <div id="refresh"
                                    class="fa-solid fa-arrows-rotate text-gray-900 dark:text-white px-3 cursor-pointer">
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <select id="domain" multiple="multiple"
                                    class="js-example-basic-multiple js-states form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    style="width: 100%" name="domain[]">
                                    @foreach ($domain as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_domain }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject*</label>
                            <div class="flex-auto">
                                <input name="subject" type="text" id="subject"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Subject" required>
                            </div>
                        </div>
                        <div>
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan*</label>
                            <div class="flex-auto">
                                <textarea name="catatan" id="nama_pelanggan" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Catatan" required></textarea>
                            </div>
                        </div>
                        {{-- <div id="accordion-collapse" data-accordion="collapse" class="col-span-2">
                            <h2 id="accordion-collapse-heading-1">
                                <button type="button"
                                    class="flex items-center justify-between w-full font-medium text-left text-black dark:text-white border-b border-gray-400 focus:bg-transparent dark:focus:bg-transparent focus:border-none dark:focus:border-none dark:focus:text-white active:text-gray-700 dark:active:text-white dark:bg-transparent bg-transparent p-2"
                                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-1">
                                    <span class="text-sm">Lainnya</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden p-2 space-y-2"
                                aria-labelledby="accordion-collapse-heading-1">
                                <div>
                                    <label for="labels[]">
                                        <p class="dark:text-white text-gray-900">Label :</p>
                                        <select name="labels[]" class="js-example-basic-multiple w-full"
                                            style=" width: 100%" multiple>
                                            @foreach ($label as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                                <div>
                                    <label for="sublabels[]">
                                        <p class="dark:text-white text-gray-900">Sub Label :</p>
                                        <select name="sublabels[]" class="js-example-basic-multiple w-full"
                                            style=" width: 100%" multiple>
                                            @foreach ($sublabel as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <button type="submit"
                        class="  dark:bg-gray-600 bg-blue-900 text-white p-3 rounded shadow-sm focus:outline-none hover:to-blue-800 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Simpan
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
