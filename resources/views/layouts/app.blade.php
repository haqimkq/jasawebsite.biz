<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
@props(['title' => ''])

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if ($title)
            {{ $title }}
        @else
            Jasawebsite.biz
        @endif
    </title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('logo.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/typography@0.4.x/dist/typography.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
    {{-- <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>







    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    {{-- <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet" /> --}}
</head>


@vite(['resources/css/app.css'])

<body class="font-sans antialiased">
    @if (Auth::user() && Auth::user()->isAdmin == true)
        <div class="hidden sm:block">
            @include('layouts.sidebar')
        </div>
        <div class="sm:hidden block">
            @include('layouts.bottombar')
        </div>
    @elseif(Auth::user() && Auth::user()->isSupport == true)
        <div class="hidden sm:block">
            @include('layouts.sidebar')
        </div>
        <div class="sm:hidden block">
            @include('layouts.bottombar')
        </div>
    @endif

    @include('layouts.navigation')
    <div class="min-h-screen bg-white dark:bg-gray-900 pt-16 sm:pt-[64.67px] sm:pb-0 pb-24">

        <!-- Page Heading -->
        @if (isset($header))
            <header class=" dark:bg-gray-800 bg-blue-900 shadow rounded-b-3xl duration-500">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto">
            <div class="space-y-2 py-2">
                @if (count($errors) > 0)
                    <div class="alertError bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-3"
                        role="alert">
                        @foreach ($errors->all() as $error)
                            <li><span class="block sm:inline">{{ $error }}</span></li>
                        @endforeach
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500 close-btn" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alertSuccess bg-green-200 text-green-800 px-4 py-3 rounded relative mx-3">
                        {{ session('success') }}
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500 close-btn2" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @endif
                @if (session('whatsapp_success'))
                    <div class="alertSuccess bg-green-200 text-green-800 px-4 py-3 rounded relative mx-3">
                        {{ session('whatsapp_success') }}
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500 close-btn2" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @endif
            </div>

            {{ $slot }}
            @if (Auth::user()->isAdmin == true)
                <div>
                    <button class="btn-floating whatsapp" id="liveChat">
                        <div class="">
                            <div>
                                <div class="relative w-4 mx-auto">
                                    <i class="fa-solid fa-comment"></i>
                                    <div class="absolute top-0 right-[-4px] w-3 h-3 bg-red-500 rounded-full"
                                        style="display: none" id="tickChat">
                                    </div>
                                </div>
                            </div>
                            <span>Click For Chat</span>
                        </div>
                    </button>
                    <div id="liveChatContainer" class="fixed bottom-[25px] right-[25px] w-80 z-50"
                        style="display: none">
                        <div class="relative">
                            <div class="absolute text-right top-0 p-[15px] right-1 font-extrabold">
                                <button id="closeButton" class="text-white">X</button>
                            </div>
                            <div id="getLiveChat" class="w-80 h-96 rounded-lg overflow-hidden">
                                <iframe src="{{ route('Chat') }}" frameborder="0" class="h-full w-full"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <script>
                function updateUnreadCount() {
                    const tickChat = document.getElementById('tickChat');
                    fetch('/chats/count')
                        .then(response => response.json())
                        .then(data => {
                            if (data > 0) {
                                tickChat.style.display = 'block';
                            } else {
                                tickChat.style.display = 'none';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching unread messages:', error);
                        });
                }

                setInterval(updateUnreadCount, 10000);
            </script>
        </main>
    </div>
    {{-- @include('layouts.footer') --}}

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://kit.fontawesome.com/a6c5beee0a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/datepicker.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
        integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js"></script>
    <script>
        const buttonChat = document.getElementById('liveChat');
        const closeButton = document.getElementById('closeButton');
        const chatContainer = document.getElementById('liveChatContainer');

        buttonChat.addEventListener('click', function() {
            chatContainer.style.display = 'block';
            buttonChat.style.display = 'none';
        });
        closeButton.addEventListener('click', function() {
            chatContainer.style.display = 'none';
            buttonChat.style.display = 'block';
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        $(document).ready(function() {

            var selectInput = $('.searchSelect2');
            $('.searchSelect2').select2({
                placeholder: 'Search',
                minimumInputLength: 3,
                language: {
                    inputTooShort: function() {
                        return 'Masukkan Minimal 3 Huruf';
                    }
                },
                width: '100%',
                allowClear: true
            });
            selectInput.on('select2:select', function(e) {
                // Hapus nilai input saat pengguna memilih opsi
                selectInput.val('').trigger('change');
                var selectedOptionValue = e.params.data.id;
                window.location = selectedOptionValue;
            });

        });
    </script>
    <script>
        tinymce.init({
            selector: '#wiswig',
            plugins: 'powerpaste advcode table lists advlist image checklist accordion',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table | image'
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.close-btn').click(function() {
                $(this).closest('.alertError').remove();
            });
        });
        $(document).ready(function() {
            $('.close-btn2').click(function() {
                $(this).closest('.alertSuccess').remove();
            });
        });
        $(document).ready(function() {
            $('.close-button').click(function() {
                $(this).closest('.alertUrgent').remove();
            });
        });
    </script>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        var MobilethemeToggleDarkIcon = document.getElementById('mobile-theme-toggle-dark-icon');
        var MobilethemeToggleLightIcon = document.getElementById('mobile-theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            MobilethemeToggleLightIcon.classList.remove('hidden');
        } else {
            MobilethemeToggleDarkIcon.classList.remove('hidden');
        }

        var MobileThemeToggleBtn = document.getElementById('mobile-theme-toggle');

        MobileThemeToggleBtn.addEventListener('click', function() {

            MobilethemeToggleDarkIcon.classList.toggle('hidden');
            MobilethemeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>
</body>

</html>
