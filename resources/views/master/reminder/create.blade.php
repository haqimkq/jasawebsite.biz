<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl overflow-x-hidden lg:py-8">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Reminder Todo List</h2>
            <div class="">
                <form action="{{ route('reminder.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center gap-4 justify-between">
                                <label for="nama_pelanggan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    User</label>
                                <button onclick="selectAll()" type="button">
                                    <svg viewBox="0 0 24 24" class="w-5 dark:fill-white" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M20.4961766,5.62668182 C21.3720675,5.93447702 22,6.76890777 22,7.75 L22,17.75 C22,20.0972102 20.0972102,22 17.75,22 L7.75,22 C6.76890777,22 5.93447702,21.3720675 5.62668182,20.4961766 L7.72396188,20.4995565 L17.75,20.5 C19.2687831,20.5 20.5,19.2687831 20.5,17.75 L20.5,7.75 L20.4960194,7.69901943 L20.4961766,5.62668182 Z M17.246813,2 C18.4894537,2 19.496813,3.00735931 19.496813,4.25 L19.496813,17.246813 C19.496813,18.4894537 18.4894537,19.496813 17.246813,19.496813 L4.25,19.496813 C3.00735931,19.496813 2,18.4894537 2,17.246813 L2,4.25 C2,3.00735931 3.00735931,2 4.25,2 L17.246813,2 Z M13.4696699,7.46966991 L9.58114564,11.3581942 L8.6,10.05 C8.35147186,9.71862915 7.88137085,9.65147186 7.55,9.9 C7.21862915,10.1485281 7.15147186,10.6186292 7.4,10.95 L8.9,12.95 C9.17384721,13.3151296 9.70759806,13.3530621 10.0303301,13.0303301 L14.5303301,8.53033009 C14.8232233,8.23743687 14.8232233,7.76256313 14.5303301,7.46966991 C14.2374369,7.1767767 13.7625631,7.1767767 13.4696699,7.46966991 Z"
                                            id="🎨-Color"> </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex gap-4">
                                <select id="user" multiple="multiple"
                                    class="js-example-basic-multiple js-states form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    style="width: 100%" name="user[]" required>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($reminder->pluck('user_id')->contains($item->id)) selected @endif>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach

                                </select>
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

    </section>

</x-app-layout>
<script>
    function selectAll() {
        $("#user > option").prop("selected", true);
        $("#user").trigger("change");
    }
</script>
