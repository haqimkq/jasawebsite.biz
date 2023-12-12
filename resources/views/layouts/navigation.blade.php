@php
    use App\Models\Notification;
    use App\Models\Domain;
    $notif = Notification::with('domain')->get();
    $countUnread = Notification::where('isRead', false)
        ->where('isAdmin', true)
        ->count();
    $countUnreadUser = Notification::where('isRead', false)
        ->where('notif_pelanggan', auth()->id())
        ->count();
    $Unread = Notification::with('domain')
        ->where('isRead', false)
        ->get();
    $UnreadUser = Notification::with('domain')
        ->where('isRead', false)
        ->where('notif_pelanggan', auth()->id())
        ->get();
@endphp

<nav x-data="{ open: false }" class="z-20 dark:bg-transparent fixed w-full ">
    <!-- Primary Navigation Menu -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex justify-between w-full">
                <!-- Logo -->
                <div class="items-center w-48 overflow-auto">
                    <a href="{{ route('welcome') }}">
                        <div class="w-full h-full flex justify-center items-center">
                            <div class="logo">
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center">
                    @if (Auth::user() && Auth::user()->isSupport == true)
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                    @else
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                                {{ __('Home') }}
                            </x-nav-link>
                        </div>
                    @endif
                    {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <button id="dropdownLayanan" data-dropdown-toggle="dropdownLayanans"
                            class="inline-flex items-center text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out"
                            type="button">Layanan<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownLayanans"
                            class="z-10 hidden rounded-lg shadow dark:bg-gray-700 bg-white border-blue-900 border dark:border-none">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 divide-y divide-gray-300 dark:divide-gray-600"
                                aria-labelledby="dropdownLayanan">
                                <li>
                                    <a href="{{ route('layanan.website') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Jasa
                                        Pembuatan Website</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Jasa
                                        SEO</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Jasa
                                        Maintenance Website</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    {{-- 
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                            {{ __('Contact') }}
                        </x-nav-link>
                    </div> --}}
                </div>

                {{-- Nofification and Username --}}
                @if (Auth::user())
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <button id="theme-toggle" type="button"
                            class="text-gray-500 dark:text-gray-400 rounded-full text-sm p-2.5 ease-in-out duration-200">
                            <div class="flex justify-center items-center">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5"
                                    fill="rgb(55 65 81 / var(--tw-bg-opacity))" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </div>
                            <div class="flex justify-center items-center">
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="#ffffff"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                        <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                            data-dropdown-placement="bottom-end"
                            class="inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 14 20">
                                <path
                                    d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                            </svg>
                            @if (Auth::user() && Auth::user()->isSupport == true)
                                @if ($countUnread == 0)
                                @else
                                    <div class="relative flex">
                                        <div
                                            class="relative inline-flex w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-2 right-3 dark:border-gray-900">
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if ($countUnreadUser == 0)
                                @else
                                    <div class="relative flex">
                                        <div
                                            class="relative inline-flex w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-2 right-3 dark:border-gray-900">
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </button>
                        <!-- Dropdown Notification -->
                        <div id="dropdownNotification" style="transform: translate3d(869.333px, 52px, 0px)!important;"
                            class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700 border-blue-900 dark:border-white border"
                            aria-labelledby="dropdownNotificationButton">
                            <div
                                class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                                Notifications
                            </div>
                            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                @if (Auth::user() && Auth::user()->isAdmin == true)
                                    @foreach ($Unread->take(3) as $item)
                                        @if ($item->isAdmin)
                                            <a href="{{ route('domain.edit', $item->domain->id) }}"
                                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <div class="flex-shrink-0">
                                                    <img class="rounded-full w-11 h-11"
                                                        src="{{ asset('storage/images/fotoProfil') }}/{{ $item->domain->pelanggan->image }}"
                                                        alt="Jese image">
                                                    <div
                                                        class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                                                        <svg class="w-2 h-2 text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 18 18">
                                                            <path
                                                                d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                                            <path
                                                                d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="w-full pl-3">
                                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New
                                                        message from
                                                        <span
                                                            class="font-semibold text-gray-900 dark:text-white">{{ $item->domain->pelanggan->nama_pelanggan }}</span>:
                                                        {{ $item->nameserver }}
                                                    </div>
                                                    <div class="text-xs text-blue-600 dark:text-blue-500">
                                                        {{ $item->created_at }}</div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($UnreadUser->take(3) as $item)
                                        <a href="{{ route('domain.edit', $item->domain->id) }}"
                                            class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <div class="flex-shrink-0">
                                                <img class="rounded-full w-11 h-11"
                                                    src="{{ asset('storage/images/fotoProfil') }}/default_image.jpg"
                                                    alt="Jese image">
                                                <div
                                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                                                    <svg class="w-2 h-2 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 18 18">
                                                        <path
                                                            d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                                        <path
                                                            d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="w-full pl-3">
                                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New
                                                    message
                                                    from
                                                    <span
                                                        class="font-semibold text-gray-900 dark:text-white">Admin</span>:
                                                    {{ $item->nameserver }}
                                                </div>
                                                <div class="text-xs text-blue-600 dark:text-blue-500">
                                                    {{ $item->created_at }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                            <a href="{{ route('notif') }}"
                                class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                                <div class="inline-flex items-center ">
                                    <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                        <path
                                            d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                    </svg>
                                    View all
                                </div>
                            </a>
                        </div>
                        <!-- User -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            data-dropdown-placement="bottom-end"
                            class=" inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400  hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                            type="button">
                            {{ auth::user()->name }}
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        <div id="dropdown"
                            class="z-10 hidden rounded-lg divide-gray-100  text-left text-sm leading-5 text-gray-700 dark:text-gray-300 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 dark:bg-gray-800 bg-white border border-blue-900 dark:border-white ">
                            <ul class=" text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="{{ route('profile.edit') }}"
                                        class="block py-2 dark:hover:bg-gray-600 rounded-lg dark:hover:text-white"
                                        style="padding-left: 16px; padding-right: 100px">Profile</a>
                                </li>
                                @if (Auth::user()->isSupport == false)
                                    <li>
                                        <a href="{{ route('member.index') }}"
                                            class="block py-2 dark:hover:bg-gray-600 rounded-lg dark:hover:text-white"
                                            style="padding-left: 16px; padding-right: 100px">My Domain</a>
                                    </li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                this.closest('form').submit();"
                                            class="block py-2 dark:hover:bg-gray-600 rounded-lg dark:hover:text-white"
                                            style="padding-left: 16px; padding-right: 100px">Logout</a>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                @else
                    <x-nav-link :href="route('login')" class="hidden sm:flex sm:items-center sm:ml-6">
                        {{ __('Login') }}
                    </x-nav-link>
                @endif

                {{-- Hamburger --}}
                <div class="sm:hidden flex items-center">
                    <button id="mobile-theme-toggle" type="button"
                        class="inline-flex sm:hidden items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400 ease-in-out duration-200 mr-2">
                        <div class="flex justify-center items-center">
                            <svg id="mobile-theme-toggle-dark-icon" class="hidden w-5 h-5"
                                fill="rgb(55 65 81 / var(--tw-bg-opacity))" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </div>
                        <div class="flex justify-center items-center">
                            <svg id="mobile-theme-toggle-light-icon" class="hidden w-5 h-5" fill="#ffffff"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </button>
                    <button id="hamburgerNotif" data-dropdown-toggle="dropdownNotif"
                        data-dropdown-placement="bottom-end"
                        class="inline-flex sm:hidden items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400"
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 14 20">
                            <path
                                d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                        </svg>
                        @if (Auth::user() && Auth::user()->isAdmin == true)
                            @if ($countUnread == 0)
                            @else
                                <div class="relative flex">
                                    <div
                                        class="relative inline-flex w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-2 right-3 dark:border-gray-900">
                                    </div>
                                </div>
                            @endif
                        @else
                            @if ($countUnreadUser == 0)
                            @else
                                <div class="relative flex">
                                    <div
                                        class="relative inline-flex w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-2 right-3 dark:border-gray-900">
                                    </div>
                                </div>
                            @endif
                        @endif
                    </button>
                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                        class="dark:text-white text-blue-900 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex sm:hidden items-center"
                        type="button">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div id="dropdownNotif" style="transform: translate3d(869.333px, 52px, 0px)!important;"
                        class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700 border-blue-900 dark:border-white border"
                        aria-labelledby="hamburgerNotif">
                        <div
                            class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                            Notifications
                        </div>
                        <div class="divide-y divide-gray-100 dark:divide-gray-700">
                            @if (Auth::user() && Auth::user()->isAdmin == true)
                                @foreach ($Unread->take(3) as $item)
                                    @if ($item->isAdmin)
                                        <a href="{{ route('domain.edit', $item->domain->id) }}"
                                            class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <div class="flex-shrink-0">
                                                <img class="rounded-full w-11 h-11"
                                                    src="{{ asset('storage/images/fotoProfil') }}/{{ $item->domain->pelanggan->image }}"
                                                    alt="Jese image">
                                                <div
                                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                                                    <svg class="w-2 h-2 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 18 18">
                                                        <path
                                                            d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                                        <path
                                                            d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="w-full pl-3">
                                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New
                                                    message from
                                                    <span
                                                        class="font-semibold text-gray-900 dark:text-white">{{ $item->domain->pelanggan->nama_pelanggan }}</span>:
                                                    {{ $item->nameserver }}
                                                </div>
                                                <div class="text-xs text-blue-600 dark:text-blue-500">
                                                    {{ $item->created_at }}</div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($UnreadUser->take(3) as $item)
                                    <a href="{{ route('domain.edit', $item->domain->id) }}"
                                        class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-full w-11 h-11"
                                                src="{{ asset('storage/images/fotoProfil') }}/default_image.jpg"
                                                alt="Jese image">
                                            <div
                                                class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                                                <svg class="w-2 h-2 text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 18 18">
                                                    <path
                                                        d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                                    <path
                                                        d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="w-full pl-3">
                                            <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New
                                                message
                                                from
                                                <span class="font-semibold text-gray-900 dark:text-white">Admin</span>:
                                                {{ $item->nameserver }}
                                            </div>
                                            <div class="text-xs text-blue-600 dark:text-blue-500">
                                                {{ $item->created_at }}</div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <a href="{{ route('notif') }}"
                            class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                            <div class="inline-flex items-center ">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                    <path
                                        d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                View all
                            </div>
                        </a>
                    </div>

                    <!-- Dropdown menu -->
                    <div id="dropdownDivider"
                        class="z-10 hidden bg-blue-900 divide-y divide-gray-100 shadow w-full dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-white dark:text-gray-200"
                            aria-labelledby="dropdownDividerButton">
                            <li>
                                @if (Auth::user() && Auth::user()->isSupport == true)
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 hover:bg-blue-800 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard
                                    </a>
                                @else
                                @endif
                                @if (Auth::user())
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 hover:bg-blue-800 dark:hover:bg-gray-600 dark:hover:text-white">Profile
                                    </a>
                                    <a href="{{ route('contact') }}"
                                        class="block px-4 py-2 hover:bg-blue-800 dark:hover:bg-gray-600 dark:hover:text-white">Contact
                                        us
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                            href="{{ route('logout') }}"
                                            class="block px-4 py-2 hover:bg-blue-800 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Logout</a>
                                    </form>
                                    <div class="py-2 border-t border-gray-500">
                                        <h2 class="block px-4 text-sm text-gray-200 ">
                                            {{ auth::user()->name }}
                                        </h2>
                                        <h2 class="block px-4 text-sm text-gray-200 "> {{ auth::user()->email }}</h2>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Login
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script>
            $(window).scroll(function() {
                if ($(window).scrollTop()) {
                    $("nav").addClass("gray");
                } else
                    $("nav").removeClass("gray")
            })
        </script>

</nav>
