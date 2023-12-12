@php
    use App\Models\Domain;
    use App\Models\LabelDomain;
    $domain = Domain::all();
    $label = labelDomain::where('name', 'urgent')->first();
@endphp
@if ($label)
    <x-modal.addLabelDomainModal2 :domain="$domain" :label="$label->domain" name="{{ $label->name }}"
        id="{{ $label->id }}" />
@else
    <x-modal.addLabelDomainModal2
        @if (isset($domain)) :domain="$domain"
    @else
    :domain="null" @endif :label="$label->domain"
        :name="$label->name" id="{{ $label->id }}" />
@endif
<div class="fixed z-50 w-full h-16 -translate-x-1/2   bottom-4 left-1/2  px-3">
    <div
        class="grid h-full max-w-lg grid-cols-5 mx-auto dark:bg-gray-700 dark:border-gray-600 bg-white border border-gray-200 rounded-full  ">
        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group rounded-l-full">
            <button data-tooltip-target="tooltip-home" type="button" class="">
                <svg aria-hidden="true"
                    class="w-6 h-6  transition duration-75 fill-gray-500 dark:fill-gray-400 group-hover:fill-blue-600 dark:group-hover:fill-blue-500"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                </svg>
                <span class="sr-only">Dashboard</span>
            </button>
        </a>
        <div id="tooltip-home" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Dashboard
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        {{-- Urgent --}}
        <button data-modal-target="addLabelDomainModal2-{{ $label->id }}" data-tooltip-target="tooltip-settings"
            data-modal-toggle="addLabelDomainModal2-{{ $label->id }}"
            class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group ">
            <div class=" fill-gray-500 dark:fill-gray-400 group-hover:fill-blue-600 dark:group-hover:fill-blue-500">
                <svg width="24px" height="24px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m 8 0 c -0.257812 0 -0.511719 0.0976562 -0.707031 0.292969 l -1.707031 1.707031 h -2.585938 c -0.550781 0 -1 0.449219 -1 1 v 2.585938 l -1.707031 1.707031 c -0.3906252 0.390625 -0.3906252 1.023437 0 1.414062 l 1.707031 1.707031 v 2.585938 c 0 0.550781 0.449219 1 1 1 h 2.585938 l 1.707031 1.707031 c 0.390625 0.390625 1.023437 0.390625 1.414062 0 l 1.707031 -1.707031 h 2.585938 c 0.550781 0 1 -0.449219 1 -1 v -2.585938 l 1.707031 -1.707031 c 0.390625 -0.390625 0.390625 -1.023437 0 -1.414062 l -1.707031 -1.707031 v -2.585938 c 0 -0.550781 -0.449219 -1 -1 -1 h -2.585938 l -1.707031 -1.707031 c -0.195312 -0.1953128 -0.449219 -0.292969 -0.707031 -0.292969 z m -1 4 h 2 v 5 h -2 z m 1 5.75 c 0.6875 0 1.25 0.5625 1.25 1.25 s -0.5625 1.25 -1.25 1.25 s -1.25 -0.5625 -1.25 -1.25 s 0.5625 -1.25 1.25 -1.25 z m 0 0" />
                </svg>
            </div>
            <span class="sr-only">Add Urgent Domain</span>
        </button>
        <div id="tooltip-settings" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Add Urgent Domain
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        {{-- Menu --}}
        <div class="flex items-center justify-center">
            <div class="menu">
                <input type="checkbox" id="toogle" class="hidden-trigger">
                <label for="toogle"
                    class="circle hover:cursor-pointer hover:bg-gray-900 rounded-full fill-gray-700 hover:fill-white hover:border-none scale-75">
                    <div class=" flex justify-center items-center w-full h-full">
                        <div class=" w-6">
                            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m22 16.75c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75z"
                                    fill-rule="nonzero" />
                            </svg>
                        </div>
                    </div>
                </label>
                <div class="subs">
                    {{-- Invoice --}}
                    <div id="tooltip-invoice-create" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border dark:border-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-xs  whitespace-nowrap">
                        Buat Invoice
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle" data-tooltip-target="tooltip-invoice-create">
                        <input value="1" name="sub-circle" type="radio" id="sub1" class="hidden-sub-trigger"
                            onclick=" window.location.href='/invoice/create'">
                        <label for="sub1">
                            <div class="flex items-center justify-center h-full fill-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M11.363 2c4.155 0 2.637 6 2.637 6s6-1.65 6 2.457v11.543h-16v-20h7.363zm.826-2h-10.189v24h20v-14.386c0-2.391-6.648-9.614-9.811-9.614zm4.811 13h-2.628v3.686h.907v-1.472h1.49v-.732h-1.49v-.698h1.721v-.784zm-4.9 0h-1.599v3.686h1.599c.537 0 .961-.181 1.262-.535.555-.658.587-2.034-.062-2.692-.298-.3-.712-.459-1.2-.459zm-.692.783h.496c.473 0 .802.173.915.644.064.267.077.679-.021.948-.128.351-.381.528-.754.528h-.637v-2.12zm-2.74-.783h-1.668v3.686h.907v-1.277h.761c.619 0 1.064-.277 1.224-.763.095-.291.095-.597 0-.885-.16-.484-.606-.761-1.224-.761zm-.761.732h.546c.235 0 .467.028.576.228.067.123.067.366 0 .489-.109.199-.341.227-.576.227h-.546v-.944z" />
                                </svg>
                            </div>
                        </label>
                    </button>
                    {{-- Domain Expired --}}
                    <div id="tooltip-domain-expired" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border dark:border-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-xs  whitespace-nowrap">
                        Domain Expired
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle" data-tooltip-target="tooltip-domain-expired">
                        <input value="2" name="sub-circle" type="radio" id="sub2" class="hidden-sub-trigger"
                            onclick='window.location.href="/domains/expired"'>
                        <label for="sub2">
                            <div class="flex items-center justify-center h-full fill-gray-400">
                                <svg width="20" height="20" viewBox="0 0 24 24" class="fill-gray-400"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" />
                                </svg>
                            </div>
                        </label>
                    </button>
                    {{-- Soon Expired --}}
                    <div id="tooltip-domani-soon-expired" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border dark:border-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-xs  whitespace-nowrap">
                        Soon Expired
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle" data-tooltip-target="tooltip-domani-soon-expired">
                        <input value="3" name="sub-circle" type="radio" id="sub3" class="hidden-sub-trigger"
                            onclick=" window.location.href='/domains/soonExpired'">
                        <label for="sub3">
                            <div class="flex items-center justify-center h-full fill-gray-400">
                                <svg viewBox="0 0 24 24" width="20" height="20">
                                    <path
                                        d="M12,6a1,1,0,0,0-1,1v5a1,1,0,0,0,.293.707l3,3a1,1,0,0,0,1.414-1.414L13,11.586V7A1,1,0,0,0,12,6Z M23.812,10.132A12,12,0,0,0,3.578,3.415V1a1,1,0,0,0-2,0V5a2,2,0,0,0,2,2h4a1,1,0,0,0,0-2H4.827a9.99,9.99,0,1,1-2.835,7.878A.982.982,0,0,0,1,12a1.007,1.007,0,0,0-1,1.1,12,12,0,1,0,23.808-2.969Z">
                                    </path>
                                </svg>
                            </div>
                        </label>
                    </button>

                </div>
            </div>
        </div>
        {{-- Database --}}
        <div class="flex items-center justify-center">
            <div class="database">
                <input type="checkbox" id="db" class="hidden-trigger-database">
                <label for="db" class="circle-database inline-flex flex-col items-center justify-center px-5 ">
                    <div
                        class=" flex justify-center items-center w-full h-full hover:bg-gray-50 dark:hover:bg-gray-800 hover:fill-blue-500 fill-gray-500 dark:fill-gray-400 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path
                                d="M22 18.055v2.458c0 1.925-4.655 3.487-10 3.487-5.344 0-10-1.562-10-3.487v-2.458c2.418 1.738 7.005 2.256 10 2.256 3.006 0 7.588-.523 10-2.256zm-10-3.409c-3.006 0-7.588-.523-10-2.256v2.434c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.434c-2.418 1.738-7.005 2.256-10 2.256zm0-14.646c-5.344 0-10 1.562-10 3.488s4.656 3.487 10 3.487c5.345 0 10-1.562 10-3.487 0-1.926-4.655-3.488-10-3.488zm0 8.975c-3.006 0-7.588-.523-10-2.256v2.44c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.44c-2.418 1.738-7.005 2.256-10 2.256z" />
                        </svg>
                    </div>
                </label>
                <div class="subs-database">
                    <button class="sub-circle-database" data-tooltip-target="tooltip-domain">
                        <input value="1" name="sub-circle-database" type="radio" id="sub-database1"
                            onclick=" window.location.href='/domain'" class="hidden-sub-trigger">
                        <label for="sub-database1">
                            <i class="text-gray-400 fa-solid fa-earth-americas"></i>
                        </label>
                    </button>
                    <div id="tooltip-domain" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border dark:border-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-xs">
                        Domain
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle-database" data-tooltip-target="tooltip-pelanggan">
                        <input value="1" name="sub-circle-database" type="radio" id="sub-database2"
                            class="hidden-sub-trigger" onclick=" window.location.href='/pelanggan'">
                        <label for="sub-database2">
                            <i class="text-gray-400 fa fa-users">
                            </i>
                        </label>
                    </button>
                    <div id="tooltip-pelanggan" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border dark:border-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-xs">
                        Pelanggan
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle-database" data-tooltip-target="tooltip-nameserver">
                        <input value="1" name="sub-circle-database" type="radio" id="sub-database3"
                            class="hidden-sub-trigger" onclick=" window.location.href='/nameserver'">
                        <label for="sub-database3">
                            <i class="text-gray-400 fa-solid fa-globe"></i>
                        </label>
                    </button>
                    <div id="tooltip-nameserver" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border dark:border-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-xs whitespace-nowrap">
                        Nameserver
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle-database" data-tooltip-target="tooltip-user">
                        <input value="1" name="sub-circle-database" type="radio" id="sub-database4"
                            class="hidden-sub-trigger" onclick=" window.location.href='/user'">
                        <label for="sub-database4">
                            <i class="text-gray-400 fa fa-user"></i>
                        </label>
                    </button>
                    <div id="tooltip-user" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border dark:border-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-xs whitespace-nowrap">
                        User
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Todo --}}
        @if (Auth::user()->isAdmin == true)
            <a href="/todo"
                class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <button data-tooltip-target="tooltip-profile" type="button" class="">
                    {{-- <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg> --}}
                    <svg viewBox="0 0 24 24"
                        class="w-5 h-5 fill-gray-600 dark:fill-gray-400 group-hover:fill-blue-600 dark:group-hover:text-blue-500">
                        <path
                            d="M2,11H8a1,1,0,0,0,1-1V4A1,1,0,0,0,8,3H2A1,1,0,0,0,1,4v6A1,1,0,0,0,2,11ZM3,5H7V9H3ZM8,21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H2a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1ZM3,15H7v4H3ZM23,7a1,1,0,0,1-1,1H12a1,1,0,0,1,0-2H22A1,1,0,0,1,23,7Zm0,10a1,1,0,0,1-1,1H12a1,1,0,0,1,0-2H22A1,1,0,0,1,23,17Z">
                        </path>
                    </svg>
                    <span class="sr-only">Todo List</span>
                </button>
            </a>
        @else
            <a href="/todos"
                class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <button data-tooltip-target="tooltip-profile" type="button" class="">
                    {{-- <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg> --}}
                    <svg viewBox="0 0 24 24"
                        class="w-5 h-5 fill-gray-600 dark:fill-gray-400 group-hover:fill-blue-600 dark:group-hover:text-blue-500">
                        <path
                            d="M2,11H8a1,1,0,0,0,1-1V4A1,1,0,0,0,8,3H2A1,1,0,0,0,1,4v6A1,1,0,0,0,2,11ZM3,5H7V9H3ZM8,21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H2a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1ZM3,15H7v4H3ZM23,7a1,1,0,0,1-1,1H12a1,1,0,0,1,0-2H22A1,1,0,0,1,23,7Zm0,10a1,1,0,0,1-1,1H12a1,1,0,0,1,0-2H22A1,1,0,0,1,23,17Z">
                        </path>
                    </svg>
                    <span class="sr-only">Todo List</span>
                </button>
            </a>
        @endif
        <div id="tooltip-profile" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Todo List
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        {{-- <a href="{{ route('profile.edit') }}"
            class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
            <button data-tooltip-target="tooltip-profile" type="button" class="">
                <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg>
                <span class="sr-only">Profile</span>
            </button>
        </a>
        <div id="tooltip-profile" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Profile
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div> --}}
    </div>
</div>
