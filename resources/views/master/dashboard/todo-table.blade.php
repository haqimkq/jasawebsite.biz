<div
    class="dark:bg-gray-800 bg-blue-900 rounded-lg mx-auto w-full lg:h-full  border dark:border-gray-300 border-gray-400">
    <div class="p-2 text-white bg-blue-800 dark:bg-gray-600 rounded-t-lg text-sm flex justify-between">
        @if (Auth::user()->isAdmin == true)
            <p>To Do List</p>
            <select id="selectTodo"
                class="py-1 text-xs pl-3 pr-7 dark:bg-white border dark:text-black h-min border-gray-300 bg-white text-black border-none rounded focus:ring-0 dark:hover:bg-gray-200">
                <option value="todo" selected> Todo</option>
                <option value="doing"> Doing</option>
                <option value="done"> Done</option>
            </select>
        @else
            <div class="">
                <a href="{{ route('todos.index') }}">
                    <div class="flex gap-1 items-center hover:underline">
                        <svg viewBox="0 0 24 24" class="w-5 fill-white" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.2929 9.70708C20.5789 9.99307 21.009 10.0786 21.3827 9.92385C21.7564 9.76907 22 9.40443 22 8.99997V2.99997C22 2.44768 21.5523 1.99997 21 1.99997H15C14.5955 1.99997 14.2309 2.24361 14.0761 2.61729C13.9213 2.99096 14.0069 3.42108 14.2929 3.70708L16.2322 5.64641L9.58574 12.2929C9.19522 12.6834 9.19522 13.3166 9.58574 13.7071L10.2928 14.4142C10.6834 14.8048 11.3165 14.8048 11.7071 14.4142L18.3536 7.76774L20.2929 9.70708Z">
                            </path>
                            <path
                                d="M4.5 8.00006C4.5 7.72392 4.72386 7.50006 5 7.50006H10.0625C10.6148 7.50006 11.0625 7.05234 11.0625 6.50006V5.50006C11.0625 4.94777 10.6148 4.50006 10.0625 4.50006H5C3.067 4.50006 1.5 6.06706 1.5 8.00006V19.0001C1.5 20.9331 3.067 22.5001 5 22.5001H16C17.933 22.5001 19.5 20.9331 19.5 19.0001V13.9376C19.5 13.3853 19.0523 12.9376 18.5 12.9376H17.5C16.9477 12.9376 16.5 13.3853 16.5 13.9376V19.0001C16.5 19.2762 16.2761 19.5001 16 19.5001H5C4.72386 19.5001 4.5 19.2762 4.5 19.0001V8.00006Z">
                            </path>
                        </svg>
                        <p>To Do List</p>
                    </div>
                </a>
            </div>
        @endif
    </div>
    <div class="space-y-2 h-[316px] overflow-y-scroll p-2"
        @if (Auth::user()->isAdmin == true) style="height:316px" @else style="height:420px" @endif>
        @if (count($todo) > 0)
            @foreach ($todo as $item)
                @if ($item->status != 'done')
                    <div id="todo-collapse" class=" todo-item" data-accordion="collapse"
                        data-status="{{ $item->status }}">
                        <h2 id="todo-collapse-heading-{{ $item->id }}">
                            <button type="button"
                                class="flex items-center justify-between w-full p-2 font-medium text-left 
                                                    text-gray-800 dark:text-white
                                                    border
                                                    dark:bg-gray-600 bg-blue-100
                                                    dark:border-gray-300 border-gray-200
                                                    rounded-xl
                                                    focus:ring-0 dark:focus:ring-0
                                                    dark:focus:bg-gray-600 focus:bg-blue-200
                                                    dark:focus:text-white focus:text-gray-900
                                                    dark:active:text-white active:text-gray-900
                                                    hover:bg-gray-100 dark:hover:bg-gray-800 
                                                    dark:active:bg-gray-600 active:bg-blue-200
                                                    "
                                data-accordion-target="#todo-collapse-body-{{ $item->id }}" aria-expanded="false"
                                aria-controls="todo-collapse-body-{{ $item->id }}">
                                <span class="text-sm"> {{ $item->subject }}</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="todo-collapse-body-{{ $item->id }}" class="hidden"
                            aria-labelledby="todo-collapse-heading-{{ $item->id }}">
                            <div
                                class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 bg-white rounded-lg mt-1 dark:text-white text-sm">
                                <div class="flex">
                                    <div class="flex justify-between w-40 flex-none">
                                        <p>
                                            User
                                        </p>
                                        <p>:</p>
                                    </div>
                                    <div class="ml-1">
                                        <ul>
                                            @foreach ($item->users as $items)
                                                <li>
                                                    - {{ $items->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex justify-between w-40 flex-none">
                                        <p>
                                            Domain
                                        </p>
                                        <p>:</p>
                                    </div>
                                    <div class="ml-1">
                                        <ul>
                                            @foreach ($item->domains as $items)
                                                <li>
                                                    {{ $items->nama_domain }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @if (count($item->domains) > 0)
                                    <div class="flex">
                                        <div class="flex justify-between w-40 flex-none">
                                            <p>
                                                Contact Client
                                            </p>
                                            <p>:</p>
                                        </div>
                                        <div class="ml-1">
                                            <a
                                                href="//wa.me/{{ $item->domains[0]->pelanggan->no_hp }}">{{ $item->domains[0]->pelanggan->no_hp }}</a>
                                        </div>
                                    </div>
                                @endif
                                <div class="flex">
                                    <div class="flex justify-between w-40 flex-none">
                                        <p>
                                            Catatan
                                        </p>
                                        <p>:</p>
                                    </div>
                                    <div>
                                        <p class="ml-1" style="word-break: break-all">
                                            {!! nl2br(e($item->catatan)) !!}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <button type="button"
                class="flex items-center justify-between w-full p-2 font-medium text-left 
                                        text-gray-800 dark:text-white
                                        border
                                        dark:bg-gray-600 bg-blue-100
                                        dark:border-gray-300 border-gray-200
                                        rounded-xl
                                        focus:ring-0 dark:focus:ring-0
                                        dark:focus:bg-gray-600 focus:bg-blue-200
                                        dark:focus:text-white focus:text-gray-900
                                        dark:active:text-white active:text-gray-900
                                        hover:bg-gray-100 dark:hover:bg-gray-800 
                                        dark:active:bg-gray-600 active:bg-blue-200
                                        ">
                <span class="text-sm text-center w-full"> Tidak Ada Data</span>
            </button>
        @endif


    </div>
</div>
