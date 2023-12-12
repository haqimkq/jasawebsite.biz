<x-app-layout>
    <div class="pb-20">

        <div
            class="  divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700 border-blue-900 dark:border-white border mx-10 divide-y pb-3">
            <div
                class="block px-4 py-2 font-medium text-center rounded-b-none rounded-lg bg-blue-900 text-white dark:bg-gray-800 dark:text-white">
                Notifications
            </div>
            <div class="divide-y divide-gray-100 dark:divide-gray-500">
                @if (Auth::user() && Auth::user()->isAdmin == true)
                    @foreach ($notif as $item)
                        @if ($item->isAdmin)
                            <div class="relative">
                                <a href="{{ route('domain.edit', $item->domain->id) }}"
                                    data-notification-id="{{ $item->id }}"
                                    class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 
                            @if ($item->isRead == 0) bg-gray-800
                            @else
                            bg-gray-700 @endif
                            notification-link">
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
                                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400 pr-5">New message
                                            from
                                            <span
                                                class="font-semibold text-gray-900 dark:text-white">{{ $item->domain->pelanggan->nama_pelanggan }}</span>:
                                            {{ $item->nameserver }}
                                        </div>
                                        <div class="text-xs text-blue-600 dark:text-blue-500">
                                            {{ $item->created_at }}</div>
                                    </div>
                                </a>

                                <button id="dropdownMenuIconButton-{{ $item->id }}"
                                    data-dropdown-toggle="dropdownDots->{{ $item->id }}"
                                    data-dropdown-placement="left-start"
                                    class="absolute top-0 right-0 inline-flex items-center p-2 text-sm font-medium text-center text-gray-900  rounded-lg   dark:text-white"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 4 15">
                                        <path
                                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownDots->{{ $item->id }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 border-white border overflow-hidden">
                                    <ul class=" text-sm text-gray-700 dark:text-gray-200 divide-y divide-opacity-20 divide-gray-500"
                                        aria-labelledby="dropdownMenuIconButton-{{ $item->id }}">
                                        @if ($item->isRead == false)
                                            <li>
                                                <a href="{{ route('notifications.markAsRead', ['id' => $item->id]) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mark
                                                    As Read</a>
                                            </li>
                                        @endif

                                        <li>
                                            <a href="{{ route('notifications.markAsDone', ['id' => $item->id, 'domain_id' => $item->domain->id, 'pelanggan_id' => $item->domain->pelanggan->user->id, 'nameserver' => $item->nameserver]) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mark
                                                and Send Notif</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('notif.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-start">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach ($notifUser as $item)
                        <div class="relative">
                            <button
                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 w-full text-start
                            @if ($item->isRead == 0) bg-gray-800
                            @else
                            bg-gray-700 @endif
                            notification-link">
                                <div class="flex-shrink-0">
                                    <img class="rounded-full w-11 h-11"
                                        src="{{ asset('storage/images/fotoProfil') }}/{{ $pelanggan[0]->image }}"
                                        alt="">

                                    <div
                                        class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                                        <svg class="w-2 h-2 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                            <path
                                                d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                            <path
                                                d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full pl-3">
                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400 pr-5">New message
                                        from
                                        <span class="font-semibold text-gray-900 dark:text-white">Admin</span>:
                                        {{ $item->nameserver }}
                                    </div>
                                    <div class="text-xs text-blue-600 dark:text-blue-500">
                                        {{ $item->created_at }}</div>
                                </div>
                            </button>

                            <button id="dropdownMenuIconButton-{{ $item->id }}"
                                data-dropdown-toggle="dropdownDots->{{ $item->id }}"
                                data-dropdown-placement="left-start"
                                class="absolute top-0 right-0 inline-flex items-center p-2 text-sm font-medium text-center text-gray-900  rounded-lg   dark:text-white"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDots->{{ $item->id }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 border-white border overflow-hidden">
                                <ul class=" text-sm text-gray-700 dark:text-gray-200 divide-y divide-opacity-20 divide-gray-500"
                                    aria-labelledby="dropdownMenuIconButton-{{ $item->id }}">
                                    @if ($item->isRead == false)
                                        <li>
                                            <a href="{{ route('notifications.markAsRead', ['id' => $item->id]) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mark
                                                As Read</a>
                                        </li>
                                    @endif
                                    <li>
                                        <form action="{{ route('notif.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-start">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
