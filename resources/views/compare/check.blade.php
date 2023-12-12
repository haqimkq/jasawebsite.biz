<x-app-layout>
    <form action="{{ route('compare.checkPost') }}" id="compare" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="py-3">
            <div class="w-full space-y-3">
                <p class="mx-auto text-white text-4xl text-center w-1/2 font-extrabold">Perbandingan Data Domain Pada
                    Excel
                    dengan Database
                </p>
                <div class="w-2/3 mx-auto p-3">
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                            </div>
                            <input class="hidden" type="file" name="excel_file" id="dropzone-file">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#dropzone-file').click(function() {
            $(this).val('');
        });
    });
    $(document).ready(function() {
        $('#dropzone-file').change(function() {
            $('#compare').submit();
        });
    });
</script>
