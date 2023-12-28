<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl overflow-x-hidden lg:py-8">
            <div class="sm:flex justify-between items-center bg-transparent dark:bg-transparent px-3 rounded-t-lg">
                <ul class="flex justify-center sm:justify-start flex-wrap -mb-px text-sm font-medium text-center"
                    id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 dark:border-b-2 focus:border-b-2 active:border-b-2 hover:border-b-2 focus:border-orange-600 active:border-orange-600 hover:text-orange-500 rounded-t-lg  text-white active:text-orange-500 hover:border-orange-500 focus:text-orange-500 dark:text-white dark:active:text-white dark:focus:text-white"
                            id="list-todo-tab" data-tabs-target="#tabs-todo" type="button" role="tab"
                            aria-controls="todo" aria-selected="false">
                            Request Edit Website</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 dark:border-b-2 focus:border-b-2 active:border-b-2 hover:border-b-2 focus:border-orange-600 active:border-orange-600 hover:text-orange-500 rounded-t-lg  text-white active:text-orange-500 hover:border-orange-500 focus:text-orange-500 dark:text-white dark:active:text-white dark:focus:text-white"
                            id="list-doing-tab" data-tabs-target="#tabs-doing" type="button" role="tab"
                            aria-controls="doing" aria-selected="false">
                            Request Edit Nameserver</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden p-2 rounded-b-lg bg-blue-900 dark:bg-gray-900 space-y-2" id="tabs-todo"
                    role="tabpanel" aria-labelledby="list-todo-tab">
                    <div class="">
                        <form action="{{ route('storeTodoByUser', $pelanggan->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-4">

                                <div>
                                    <label for="nama_domain"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Domain</label>
                                    <div class="flex-auto">
                                        <input name="domain_id" type="text" id="domain_id"
                                            class="bg-gray-50 border hidden border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{ $domain->id }}" readonly required>
                                        <input name="nama_domain" type="text" id="nama_domain"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{ $domain->nama_domain }}" readonly required>
                                    </div>
                                </div>
                                <div>
                                    <label for="nama_pelanggan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                                    <div class="flex-auto">
                                        <input name="subject" type="text" id="subject"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="cth : Landing Page" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="nama_pelanggan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                    <div class="flex-auto">
                                        <textarea name="catatan" id="nama_pelanggan" rows="3"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="cth : Ubah Design Landing Page...."></textarea>
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
                <div class="hidden p-2 rounded-b-lg bg-blue-900 dark:bg-gray-900 space-y-2" id="tabs-doing"
                    role="tabpanel" aria-labelledby="list-doing-tab">
                    <div class="mb-2">
                        <label for="nama_domain"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nameserver</label>
                        <div class="flex-auto">
                            <input data-modal-target="editNameserver-{{ $domain->id }}"
                                data-modal-toggle="editNameserver-{{ $domain->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value=" {{ $domain->nameserver ? $domain->nameserver->nameserver1 . ' - ' . $domain->nameserver->nameserver2 : '-' }}"readonly>
                        </div>
                        <x-modal.editNameserver id='{{ $domain->id }}'
                            nameserver1='{{ $domain->nameserver ? $domain->nameserver->nameserver1 : null }}'
                            nama_domain="{{ $domain->nama_domain }}"
                            nameserver2='{{ $domain->nameserver ? $domain->nameserver->nameserver2 : null }}'>
                        </x-modal.editNameserver>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
