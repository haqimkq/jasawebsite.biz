<x-app-layout>
    {{-- Typewriter --}}
    <div class="bg-blue-900 dark:bg-gray-900 duration-500">
        <section class="home bg-moon" id="home">
            <div class="max-width">
                <div class="home-content">
                    <div class="text-1">Hello , Welcome to</div>
                    <div class="text-2">Jasawebsite.biz</div>
                    <div class="text-3">You Will Get <span id="app"></span></div>
                    @if (Route::has('login'))
                        <div class=" bg-transparent p-2 d-flex  ">
                            @auth
                                <a href="{{ route('website') }}" style="text-decoration: none">Buat Website <i
                                        class="fa-solid fa-arrow-right-to-bracket mx-1"></i></a>
                            @else
                                <div id="button">
                                    <a href="{{ route('register') }}" style="text-decoration: none">Register Now</a>
                                </div>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>


    {{-- Page What We Do --}}
    {{-- <div class="container-fluid sm:h-screen bg-white  py-5 sm:mx-auto sm:flex sm:items-center">
        <div class="py-5">
            <h5 class="text-center text-2xl sm:text-4xl font-bold tracking-tighter mb-5 text-gray-800">what we
                do ?</h5>
            <div class=" px-5 sm:px-20 grid grid-cols-3 gap-12 justify-center">

                <div
                    class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 sm:col-span-1 col-span-3 mb-3">
                    <a href="#">
                        <img class="rounded-t-lg"
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.oso-web.com%2Fwp-content%2Fuploads%2F2018%2F03%2Fhomepage-design-connecticut-1.jpeg&f=1&nofb=1&ipt=a364111e000ec0c5288d3b38ad1c56f4d23645ea9cc0cd753c35568b7b7b640d&ipo=images"
                            alt="" />
                    </a>
                    <div class="p-5 justify-center ">
                        <a href="#" class="flex justify-center">
                            <h5
                                class="mb-2 text-sm md:text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Jasa Pembuatan Website</h5>
                        </a>
                        <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400 text-center">Lorem
                            ipsum
                            dolor sit amet consectetur adipisicing elit. Alias, ducimus?</p>

                    </div>
                </div>
                <div
                    class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 sm:col-span-1 col-span-3 mb-3 ">
                    <a href="#">
                        <img class="rounded-t-lg   "
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.oso-web.com%2Fwp-content%2Fuploads%2F2018%2F03%2Fhomepage-design-connecticut-1.jpeg&f=1&nofb=1&ipt=a364111e000ec0c5288d3b38ad1c56f4d23645ea9cc0cd753c35568b7b7b640d&ipo=images"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#" class="flex justify-center ">
                            <h5
                                class="mb-2 text-sm md:text-xl lg:text-2xl font-bold tracking-tight  text-gray-900 dark:text-white">
                                Search Engine Optimization</h5>
                        </a>
                        <p class="mb-3 font-normal  text-sm text-gray-700 dark:text-gray-400 text-center">Lorem
                            ipsum
                            dolor sit amet consectetur adipisicing elit. Alias, ducimus?</p>

                    </div>
                </div>
                <div
                    class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 sm:col-span-1 col-span-3 mb-3 ">
                    <a href="#">
                        <img class="rounded-t-lg   "
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.oso-web.com%2Fwp-content%2Fuploads%2F2018%2F03%2Fhomepage-design-connecticut-1.jpeg&f=1&nofb=1&ipt=a364111e000ec0c5288d3b38ad1c56f4d23645ea9cc0cd753c35568b7b7b640d&ipo=images"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#" class="flex justify-center">
                            <h5
                                class="mb-2 text-sm md:text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Maintenance Website</h5>
                        </a>
                        <p class="mb-3 font-normal  text-sm text-gray-700 dark:text-gray-400 text-center">Lorem
                            ipsum
                            dolor sit amet consectetur adipisicing elit. Alias, ducimus?</p>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Page Important Website --}}
    {{-- <div class="container-fluid sm:h-screen">
        <div class="sm:grid sm:grid-cols-2">
            <div class="sm:h-screen sm:mx-auto sm:flex sm:items-center px-14 lg:px-20 sm:px-10 mx-auto py-5 sm:py-0">
                <img class="object-cover"
                    src="https://digipa.it/wp-content/uploads/2020/03/digital-marketing-illustration.png"
                    alt="">
            </div>
            <div class="sm:h-screen px-10 pb-10 md:pb-0 sm:mx-auto sm:flex sm:items-center md:px-20">
                <ul class="list-disc text-white">
                    <h5 class="sm:text-3xl text-lg tracking-tighter mb-7 font-extrabold">Pentingnya menggunakan
                        Website
                        !!</h5>
                    <li class="sm:text-base text-sm font-bold">Meningkatkan Kepercayaan Pelanggan (Branding)
                    </li>
                    <p class="sm:text-base text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Consequatur,
                        tenetur?</p>
                    <li class="sm:text-base text-sm font-bold">Sebagai Media Promosi</li>
                    <p class="sm:text-base text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Consequatur,
                        tenetur?</p>
                    <li class="sm:text-base text-sm font-bold">Sarana Katalog Produk</li>
                    <p class="sm:text-base text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Consequatur,
                        tenetur?</p>
                    <li class="sm:text-base text-sm font-bold">Meningkatkan Penjualan</li>
                    <p class="sm:text-base text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Consequatur,
                        tenetur?</p>
                </ul>
            </div>
        </div>
    </div> --}}

    {{-- Jasawebsite.biz --}}
    {{-- <div class="container-fluid bg-white p-5 ">
        <h2 class="text-center text-4xl font-extrabold tracking-tighter mb-2">Mengapa harus Jasawebsite.biz</h2>
        <p class="text-center text-xl font-medium text-gray-600">Lebih Dari 1000 Klien Telah Memilih <span
                class="text-red-500 font-extrabold"> Jasawebsite.biz </span> Untuk Pembuatan Website Sejak Tahun
            2006
        </p>

        <div class="container lg:px-56 my-8">
            <div class="grid sm:grid-cols-3 grid-cols-2 gap-10 justify-center">
                <div class="sm:col-span-1 col-span-1 bg-white shadow-2xl rounded-lg px-2 py-4">
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 object-cover "
                            src="https://cdn.iconscout.com/icon/free/png-256/evaluate-business-idea-innovation-concept-implementation-3-5356.png"
                            alt="Bonnie image" />
                        <h5
                            class="mb-1 text-md font-medium text-gray-900 uppercase sm:font-extrabold tracking-tighter text-center">
                            Konsep Desain & Marketing</h5>
                    </div>
                </div>
                <div class="sm:col-span-1 col-span-1 bg-white rounded-lg shadow-2xl px-2 py-4">
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 object-cover  "
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbeckertime.com%2Fwp-content%2Fthemes%2Fawesome-beckertime%2Fimages%2Ficon-after-sales.png&f=1&nofb=1&ipt=5bbf234409a81c3d40308082fc868540869af19c230414114354280f587a343b&ipo=images"
                            alt="Bonnie image" />
                        <h5
                            class="mb-1 text-md font-medium text-gray-900 uppercase sm:font-extrabold tracking-tighter text-center">
                            After Sales dan Jelas</h5>
                    </div>
                </div>
                <div class="sm:col-span-1 col-span-1 bg-white rounded-lg shadow-2xl px-2 py-4">
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 object-cover   "
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn1.iconfinder.com%2Fdata%2Ficons%2Fbusiness-startup-45%2F64%2F918-512.png&f=1&nofb=1&ipt=ecf6c52d2a9bf679ab297b89862284d4c5b3c361709fa8c17ba895af2e351952&ipo=images "
                            alt="Bonnie image" />
                        <h5
                            class="mb-1 text-md font-medium text-gray-900 uppercase sm:font-extrabold tracking-tighter text-center">
                            Terbaik</h5>
                    </div>
                </div>
                <div class="sm:col-span-1 col-span-1 bg-white rounded-lg shadow-2xl px-2 py-4">
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 object-cover   "
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn2.iconfinder.com%2Fdata%2Ficons%2Fcommunication-406%2F32%2Fcom-26-512.png&f=1&nofb=1&ipt=a7b841ad2a9f9dc5d139e9210a6b75d30627c184287d05b9238b00cf5041c4a1&ipo=images"
                            alt="Bonnie image" />
                        <h5
                            class="mb-1 text-md font-medium text-gray-900 uppercase sm:font-extrabold tracking-tighter text-center">
                            Stand By</h5>
                    </div>
                </div>
                <div class="sm:col-span-1 col-span-1 bg-white rounded-lg shadow-2xl px-2 py-4">
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 object-cover   "
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_361429.png&f=1&nofb=1&ipt=4ead45706b020c69eacdbec911d916b4dad5fd467e028f91a2a478e0f50526bc&ipo=images"
                            alt="Bonnie image" />
                        <h5
                            class="mb-1 text-md font-medium text-gray-900 uppercase sm:font-extrabold tracking-tighter text-center">
                            Alamat Jelas </h5>
                    </div>
                </div>
                <div class="sm:col-span-1 col-span-1 bg-white rounded-lg shadow-2xl px-2 py-4">
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 object-cover   "
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_244045.png&f=1&nofb=1&ipt=feb85515cd70be32302609f2cddf870923729c40c1c064a5b2c4637c751cf78c&ipo=images"
                            alt="Bonnie image" />
                        <h5
                            class="mb-1 text-md font-medium text-gray-900 uppercase sm:font-extrabold tracking-tighter text-center">
                            Stabil dan up 99,9%</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Portofolio --}}
    {{-- <div class="container-fluid pt-10">
        <h5 class="text-white text-center text-4xl font-extrabold font-mono">Portofolio</h5>

        @if (Auth::user() && Auth::user()->isAdmin == true)
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
            @foreach ($data->take(9) as $item)
                <div class="shadow-md shadow-white rounded-lg">
                    <img class="h-full rounded-lg" src="{{ asset('storage/images') }}/{{ $item->file }}"
                        alt="">
                </div>
            @endforeach

        </div>
        <div class="flex justify-end mx-10">
            <a href="{{ route('portofolio') }}" class="text-white bg-gray-600 p-3 rounded tracking-tighter">Lihat
                semua Portofolio</a>
        </div>
    </div> --}}

    {{-- Floating Button --}}
    {{-- <a href="http://bit.ly/konsultasiwebjbiz" target="_blank">
        <button class="btn-floating whatsapp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>Click For Chat</span>
        </button>
    </a> --}}
    <button class="btn-floating whatsapp" id="liveChat">
        <div class="">
            <div>
                <div class="relative w-4 mx-auto">
                    <i class="fa-solid fa-comment"></i>
                    <div class="absolute top-0 right-[-4px] w-3 h-3 bg-red-500 rounded-full" style="display: none"
                        id="tickChat">
                    </div>
                </div>
            </div>
            <span>Click For Chat</span>
        </div>
    </button>
    <div id="liveChatContainer" class="fixed bottom-[25px] right-[25px] w-80 z-50" style="display: none">
        <div class="relative">
            <div class="absolute text-right top-0 p-[15px] right-1 font-extrabold">
                <button id="closeButton" class="text-white">X</button>
            </div>
            <div id="getLiveChat" class="w-80 h-96 rounded-lg overflow-hidden">
                <iframe src="{{ route('user', 1) }}" frameborder="0" class="h-full w-full"></iframe>
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script>
        var app = document.getElementById("app");
        var typewriter = new Typewriter(app, {
            loop: true,
        });

        typewriter
            .typeString("Lower Price")
            .pauseFor(100)
            .deleteAll()
            .typeString("High Quality")
            .pauseFor(100)
            .deleteAll()
            .typeString("Easy Transaction")
            .pauseFor(100)
            .deleteAll()
            .start();
    </script>

</x-app-layout>
