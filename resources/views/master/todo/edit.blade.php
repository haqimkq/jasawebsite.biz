<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl overflow-x-hidden lg:py-8">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add Todo</h2>
            <div class="">
                <form action="{{ route('todo.update', $todo->id) }}" id="formEditTodo" method="post"
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
                                            @if ($todo->users->contains('id', $item->id)) selected @endif>{{ $item->name }}
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
                                            @if ($todo->domains->contains('id', $item->id)) selected @endif>{{ $item->nama_domain }}
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
                                    placeholder="Masukan Subject" value="{{ $todo->subject }}" required>
                            </div>
                        </div>
                        <div>
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                            <div class="flex-auto">
                                <textarea name="catatan" id="nama_pelanggan" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Catatan">{{ $todo->catatan }}</textarea>
                            </div>
                        </div>
                        <div id="accordion-collapse" data-accordion="collapse" class="col-span-2">
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
                                    <label for="point"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Point</label>
                                    <div class="flex-auto">
                                        <select name="point" id="point"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Masukan Subject" required>
                                            <option @if ($todo->point == 1) selected @endif value="1">1
                                            </option>
                                            <option @if ($todo->point == 2) selected @endif value="2">2
                                            </option>
                                            <option @if ($todo->point == 3) selected @endif value="3">3
                                            </option>
                                            <option @if ($todo->point == 4) selected @endif value="4">4
                                            </option>
                                            <option @if ($todo->point == 5) selected @endif value="5">5
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="labels[]">
                                        <p class="text-white">Label :</p>
                                        <select name="labels[]" class="js-example-basic-multiple w-full"
                                            style=" width: 100%" multiple>
                                            @foreach ($label as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                                {{-- <div>
                                    <label for="sublabels[]">
                                        <p class="text-white">Sub Label :</p>
                                        <select name="sublabels[]" class="js-example-basic-multiple w-full"
                                            style=" width: 100%" multiple>
                                            @foreach ($sublabel as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <button type="button" data-modal-target="confirmEditTodo" data-modal-toggle="confirmEditTodo"
                        class="  dark:bg-gray-600 bg-blue-900 text-white p-3 rounded shadow-sm focus:outline-none hover:to-blue-800 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Simpan
                    </button>
                    <x-modal.confirmEditTodo>
                    </x-modal.confirmEditTodo>
                </form>
            </div>
        </div>
    </section>


</x-app-layout>
<script>
    $(document).ready(function() {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var selectedValues = []; // Array to store selected option values

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
