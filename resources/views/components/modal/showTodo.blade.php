@props(['todos' => '[]'])

<div id="showTodo-{{ $todos->id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-2 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-h-full max-w-4xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 border-white border">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white leading-none">
                        {{ $todos->subject }}
                    </h3>
                    <p class="text-xs text-gray-400">
                        {{ \Carbon\Carbon::parse($todos->created_at)->isoFormat('D MMMM YYYY HH:mm') }}
                    </p>
                </div>
                <div class="flex items-center gap-1">
                    <form action="{{ route('todo.destroy', $todos->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    <button type="button">
                        <a href="{{ route('todo.edit', $todos->id) }}"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"><i
                                class="fa-solid fa-pen"></i></a>
                    </button>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="showTodo-{{ $todos->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>

                </div>
            </div>
            <!-- Modal body -->
            <div class="p-5 text-black dark:text-white">
                <span class="text-sm leading-none text-gray-400"> {{ $todos->point }} Points</span>
                @if (count($todos->domains) > 0)
                    <div class="flex">
                        <div class="flex justify-between w-20 flex-none">
                            <p>
                                Domain
                            </p>
                            <p>:</p>
                        </div>
                        <div class="ml-1">
                            {{ $todos->domains[0]->nama_domain }}
                        </div>
                    </div>
                @endif
                <div class="flex">
                    <div class="flex justify-between w-20 flex-none">
                        <p>
                            Catatan
                        </p>
                        <p>:</p>
                    </div>
                    <div class="ml-1">
                        {!! nl2br(e($todos->catatan)) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
