<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Selamat datang di JasaWebsite.biz, platform profesional untuk membuat dan mengelola situs web. Login ke akun Anda untuk mengakses berbagai fitur dan layanan, termasuk desain web kustom, pengelolaan konten, dan pemantauan performa situs. Dapatkan pengalaman membuat website yang mudah dan efisien bersama JasaWebsite.biz">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet"> --}}
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="w-full bg-gradient-to-r from-[#0a1b65] to-[#0a5b66] dark:bg-gray-900 dark:from-gray-900 dark:to-gray-900 h-screen">
        <div class=" h-full flex items-center justify-center bg-moon">
            <div class="lg:grid lg:grid-cols-2 flex-auto">
                <div class="lg:col-span-1 self-center pt-6 bg-transparent mb-5">
                    <a href="/" class="flex justify-center">
                        <img class="w-56 lg:w-auto" src="{{ asset('assets/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="lg:col-span-1 self-center lg:px-32 px-10">
                    <div
                        class="dark:bg-[#1f2937eb] bg-[#ffffffb3] backdrop-blur-sm px-6 py-7  self-center shadow-md border dark:border-white border-[#ff8600] rounded-lg">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('build/assets/app.js') }}"></script>

</html>
