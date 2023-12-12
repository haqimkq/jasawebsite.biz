<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl overflow-x-hidden lg:py-8">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Cronjob</h2>
            <div class="">
                <form action="{{ route('cronjob.update', $cronjob->id) }}" id="formEditTodo" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                User</label>
                            <div class="flex gap-4">
                                <select id="user" multiple="multiple"
                                    class="js-example-basic-multiple js-states form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    style="width: 100%" name="user[]" required>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($cronjob->users->contains('id', $item->id)) selected @endif>{{ $item->name }}
                                        </option>
                                    @endforeach

                                </select>
                                <a href="{{ route('user.create') }}" target="_blank"
                                    class="text-white bg-blue-800 dark:bg-gray-700 rounded-lg flex justify-center px-3 items-center relative">
                                    +
                                </a>
                            </div>
                        </div>
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
                                <select id="domain"
                                    class="js-example-basic-multiple js-states form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    style="width: 100%" name="domain">
                                    <option value="">Pilih Domain</option>
                                    @foreach ($domain as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($cronjob->domains->contains('id', $item->id)) selected @endif>{{ $item->nama_domain }}
                                        </option>
                                    @endforeach
                                </select>

                                <a href="{{ route('domain.create') }}" target="_blank"
                                    class="text-white bg-blue-800 dark:bg-gray-700 rounded-lg flex justify-center px-3 items-center relative">
                                    +
                                </a>
                            </div>
                        </div>

                        <div>
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                            <div class="flex-auto">
                                <input name="subject" type="text" id="subject"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Subject" value="{{ $cronjob->subject }}" required>
                            </div>
                        </div>
                        <div>
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                            <div class="flex-auto">
                                <input name="date" type="number" id="date" max="29"
                                    value="{{ $cronjob->date }}" oninput="validasiInput()"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Tanggal" required>
                            </div>
                        </div>
                        <script>
                            function validasiInput() {
                                var input = document.getElementById('date');
                                if (input.value > 29) {
                                    input.value = 29;
                                }
                            }
                        </script>
                        <div>
                            <label for="time"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu</label>
                            <div class="flex-auto">
                                <input name="time" type="time" id="time" value="{{ $cronjob->time }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Tanggal" required>
                            </div>
                        </div>
                        <div>
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                            <div class="flex-auto">
                                <textarea name="catatan" id="nama_pelanggan" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Catatan" required>{{ $cronjob->catatan }}</textarea>
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
    $(document).ready(function() {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var selectedValues = [];

        function getDomain() {
            $.ajax({
                url: '/domains/hosting',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    $.each(data.data, function(index, item) {
                        if ($('#domain option[value="' + item.id + '"]').length === 0) {
                            $('#domain').append('<option value="' + item.id + '">' + item
                                .nama_domain + '</option>');
                        }
                    });
                    $('#domain').val(selectedValues);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        getDomain();

        // Store selected values before refreshing
        $('#domain').on('change', function() {
            selectedValues = $(this).val();
        });

        $('#refresh').on('click', function() {
            getDomain();
        });
    });
</script>
