<x-app-layout title="Ubah Pelanggan">

    <section class="bg-white dark:bg-gray-900 p-5">
        <div class="py-8 px-4 mx-auto max-w-2xl border dark:border-white border-blue-900 rounded-lg">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Pelanggan</h2>
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex justify-center">
                    <div class="relative">
                        <img id="fotoProfil" class="object-cover w-40 h-40"
                            src="{{ asset('storage/images/fotoProfil/') }}/{{ $pelanggan->image }} " alt="">
                        <div class="absolute z-10 top-0  opacity-0 hover:opacity-100">
                            <label for="fotoProfilInput">
                                <div class="w-40 h-40 bg-black opacity-60 flex items-center">
                                    <p class="text-center w-full"><i class="fa-solid fa-pen"
                                            style="color: #ffffff;"></i>
                                    </p>
                                </div>
                                <input accept="image/*" type="file" name="image" class="hidden"
                                    id="fotoProfilInput" />
                            </label>
                        </div>
                        <script>
                            fotoProfilInput.onchange = evt => {
                                const [file] = fotoProfilInput.files
                                if (file) {
                                    fotoProfil.src = URL.createObjectURL(file)
                                }
                            }
                        </script>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="col-span-2">
                        <label for="nama_pelanggan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pelanggan</label>
                        <input type="text" value="{{ $pelanggan->nama_pelanggan }}" name="nama_pelanggan"
                            id="nama_pelanggan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nama Pelanggan" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Hp</label>
                        <input type="text" value="{{ $pelanggan->no_hp }}" name="no_hp" id="no_hp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nomor Handphone">
                    </div>
                    <div class="col-span-2">
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            name="alamat" id="alamat" rows="3" required>{{ $pelanggan->alamat }}</textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="user_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                        <div class="flex gap-3">
                            <select id="user_id" name="user_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="{{ $pelanggan->user->id }}">{{ $pelanggan->user->name }}</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div>
                                <button type="button"
                                    class="px-3 h-full bg-blue-900 dark:bg-gray-700 rounded-lg border border-gray-600 text-gray-300"
                                    data-modal-target="userModal" data-modal-toggle="userModal">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="link_history"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link History</label>
                        <input type="text" value="{{ $pelanggan->link_history }}" name="link_history"
                            id="link_history"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Link History">
                    </div>
                    <div class="col-span-2">
                        <label for="user_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Label</label>
                        <div class="flex gap-3">
                            <select id="user_id" name="label_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Pilih Label</option>
                                @foreach ($label as $item)
                                    <option style="color: {{ $item->color }}" value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div>
                                <button type="button"
                                    class="px-3 h-full bg-blue-900 dark:bg-gray-700 rounded-lg border border-gray-600 text-gray-300"
                                    data-modal-target="labelModal" data-modal-toggle="labelModal">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="keterangan_pelanggan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <textarea name="keterangan_pelanggan" id="keterangan_pelanggan" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Deskripsi / Keterangan ">{{ $pelanggan->keterangan_pelanggan }}</textarea>
                    </div>
                </div>
                <button type="submit"
                    class="  dark:bg-gray-600 bg-blue-900 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-500 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-primary-700 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
            </form>
            @include('components.modal.addUser')
            @include('components.modal.addLabel')
        </div>
    </section>

</x-app-layout>
