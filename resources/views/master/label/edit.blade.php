<x-app-layout>
    <style>
        .edit- {
            color: var(--editIcon-color);
            /* Gunakan CSS variable untuk warna icon */
        }
    </style>
    <!-- Modal body -->
    <div>
        <div class="p-5">
            <form action="{{ route('label.update', $label->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="">
                    <label for="nama_pelanggan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-start">Nama
                        Label</label>
                    <div class="flex gap-4">
                        <div class="flex-auto">
                            <input type="text" name="name" id="nama_pelanggan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Nama Label" required="" value="{{ $label->name }}">
                        </div>
                        <div class="col-span-1 border rounded-lg flex justify-center px-3 items-center relative">
                            <i class="edit- fa-solid fa-tag"></i>
                            <input type="color" name="color" id="editColorInput"
                                class="opacity-0 z-50 absolute bg-gray-50 border" value="{{ $label->color }}"
                                required="">
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

    <script>
        const editColorInput = document.getElementById('editColorInput');
        const editIcon = document.querySelector('.edit-');

        editColorInput.addEventListener('input', (event) => {
            const selectedColor = event.target.value;
            document.documentElement.style.setProperty('--editIcon-color', selectedColor);
        });
    </script>

</x-app-layout>
