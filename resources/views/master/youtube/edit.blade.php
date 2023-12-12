<x-app-layout>
    <div class="mx-auto max-w-2xl">
        <form action="{{ route('youtube.update', $youtube->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label for="judul"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul*</label>
                    <div class="flex-auto">
                        <input name="judul" type="text" id="judul"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan judul" value="{{ $youtube->judul }}" required>
                    </div>
                </div>
                <div>
                    <label for="link"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link*</label>
                    <div class="flex-auto">
                        <input name="link" type="text" id="link"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Link Youtube" value="{{ $youtube->link }}" required>
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-4 justify-between mr-4">
                        <label for="nama_pelanggan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            User</label>
                        <button onclick="selectAll()" type="button">
                            <svg viewBox="0 0 24 24" class="w-5 dark:fill-white mr-8" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path
                                    d="M20.4961766,5.62668182 C21.3720675,5.93447702 22,6.76890777 22,7.75 L22,17.75 C22,20.0972102 20.0972102,22 17.75,22 L7.75,22 C6.76890777,22 5.93447702,21.3720675 5.62668182,20.4961766 L7.72396188,20.4995565 L17.75,20.5 C19.2687831,20.5 20.5,19.2687831 20.5,17.75 L20.5,7.75 L20.4960194,7.69901943 L20.4961766,5.62668182 Z M17.246813,2 C18.4894537,2 19.496813,3.00735931 19.496813,4.25 L19.496813,17.246813 C19.496813,18.4894537 18.4894537,19.496813 17.246813,19.496813 L4.25,19.496813 C3.00735931,19.496813 2,18.4894537 2,17.246813 L2,4.25 C2,3.00735931 3.00735931,2 4.25,2 L17.246813,2 Z M13.4696699,7.46966991 L9.58114564,11.3581942 L8.6,10.05 C8.35147186,9.71862915 7.88137085,9.65147186 7.55,9.9 C7.21862915,10.1485281 7.15147186,10.6186292 7.4,10.95 L8.9,12.95 C9.17384721,13.3151296 9.70759806,13.3530621 10.0303301,13.0303301 L14.5303301,8.53033009 C14.8232233,8.23743687 14.8232233,7.76256313 14.5303301,7.46966991 C14.2374369,7.1767767 13.7625631,7.1767767 13.4696699,7.46966991 Z"
                                    id="🎨-Color"> </path>
                            </svg>
                        </button>
                    </div>
                    <script>
                        function selectAll() {
                            $("#user > option").prop("selected", true);
                            $("#user").trigger("change");
                        }
                    </script>
                    <div class="flex gap-4">
                        <select id="user" multiple="multiple"
                            class="js-example-basic-multiple js-states form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%" name="user[]" required>
                            @foreach ($user as $item)
                                <option @if ($youtube->users->contains($item->id)) selected @endif value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('user.create') }}" target="_blank"
                            class="text-white bg-blue-800 dark:bg-gray-700 rounded-lg flex justify-center w-8 items-center relative">
                            +
                        </a>
                    </div>
                </div>
                <div>
                    <label for="deskripsi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi*</label>
                    <div class="flex-auto">
                        <textarea name="deskripsi" id="deskripsi" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Deskripsi" required>{{ $youtube->deskripsi }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="  dark:bg-gray-600 bg-blue-900 text-white p-3 rounded shadow-sm focus:outline-none hover:to-blue-800 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
