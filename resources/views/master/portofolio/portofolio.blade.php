<x-app-layout>
    <div class="container-fluid pt-10">
        <h5 class="text-white text-center text-4xl font-extrabold font-mono">Portofolio</h5>

        @if (Auth::user() && Auth::user()->isAdmin == true)
            {{-- modal --}}
            <div class=" flex justify-end px-10">
                <button
                    class=" text-white bg-gray-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" onclick="toggleModal('modal-id')">
                    Tambah Gambar
                </button>
            </div>

            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                id="modal-id">
                <div class="relative w-auto my-6 mx-auto max-w-3xl">
                    <!--content-->
                    <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div
                            class="flex items-start justify-between p-2 border-b border-solid border-slate-200 rounded-t">
                            <h3 class="text-xl font-semibold">
                                Tambah Gambar
                            </h3>
                            <button
                                class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                onclick="toggleModal('modal-id')">
                                <span
                                    class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                    ×
                                </span>
                            </button>
                        </div>
                        <!--body-->
                        <div class="relative px-3 flex-auto">
                            <form class="text-white" action="{{ route('store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="container flex justify-end">
                                    <div class="form-group mt-3 ">
                                        <input type="file" class="form-control text-black" id="nama"
                                            name="files[]" multiple>
                                        <div
                                            class="flex items-center justify-end p-1 mt-4 border-t border-solid border-slate-200 rounded-b">
                                            <button
                                                class="text-white rounded-md bg-red-500 background-transparent font-bold  px-4 py-1 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                type="button" onclick="toggleModal('modal-id')">
                                                Close
                                            </button>
                                            <button type="submit" id="tombol-simpan"
                                                class="text-white rounded-md bg-green-500 background-transparent font-bold  px-4 py-1 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Submit</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
            <script type="text/javascript">
                function toggleModal(modalID) {
                    document.getElementById(modalID).classList.toggle("hidden");
                    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                    document.getElementById(modalID).classList.toggle("flex");
                    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                }
            </script>
        @else
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 gap-10 p-10">
            @foreach ($data as $item)
                <div class="shadow-md shadow-white rounded-lg relative">
                    @if (Auth::user() && Auth::user()->isAdmin == true)
                        <form action="{{ route('delete') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $item->id }}" />
                            <div class="justify-end flex">
                                <button type="submit"
                                    class=" bg-red-600 py-2 px-4 rounded text-white absolute m-3 z-10 ">x</button>
                            </div>
                        </form>
                    @else
                    @endif
                    @if (Auth::user() && Auth::user()->isAdmin == true)
                        <form action="{{ route('portofolio.store') }}" method="post">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="absolute h-full flex items-end w-full ">
                                <div class=" text-white mb-5 justify-between flex w-full">
                                    <input type="text" name="nama" class="bg-gray-500 w-full"
                                        value="{{ $item->nama }}">
                                    <button class="bg-gray-700" type="submit">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="absolute h-full flex items-end w-full ">
                            <div class=" text-white mb-5 justify-between flex w-full">
                                <a href="//{{ $item->nama }}" class="bg-gray-900"> {{ $item->nama }} </a>
                            </div>
                        </div>
                    @endif

                    <img id="gambar" class="h-full rounded-lg object-fill"
                        src="{{ asset('storage/images') }}/{{ $item->file }}">

                </div>
            @endforeach

        </div>
</x-app-layout>
