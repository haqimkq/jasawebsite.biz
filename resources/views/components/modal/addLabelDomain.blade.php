<style>
    .fa-tag {
        color: var(--icon-color);
        /* Gunakan CSS variable untuk warna icon */
    }
</style>

<div id="labelModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 border-white border">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Label Domain
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="labelModal">
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
                <form action="{{ route('labelDomain.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="">
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Label</label>
                            <div class="flex gap-4">
                                <div class="flex-auto">
                                    <input type="text" name="name" id="nama_pelanggan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukan Nama Label" required="">
                                </div>
                                <div
                                    class="col-span-1 border rounded-lg flex justify-center px-3 items-center relative">
                                    <i class="fa-solid fa-tag"></i>
                                    <input type="color" name="color" id="colorInput"
                                        class="opacity-0 z-50 absolute bg-gray-50 border"
                                        placeholder="Masukan Nama Label" required="">
                                </div>

                            </div>
                        </div>
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
<script>
    const colorInput = document.getElementById('colorInput');
    const icon = document.querySelector('.fa-tag');

    colorInput.addEventListener('input', (event) => {
        const selectedColor = event.target.value;
        document.documentElement.style.setProperty('--icon-color', selectedColor);
    });
</script>
