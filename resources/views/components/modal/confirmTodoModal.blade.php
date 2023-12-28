<div id="confirmTodo" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-2 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 border-white border">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-2 rounded-t dark:border-gray-600">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#confirm-todo" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-2 border-b-2 rounded-t-lg" id="support-tab"
                            data-tabs-target="#support" type="button" role="tab" aria-controls="support"
                            aria-selected="false">Support</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="user-tab" data-tabs-target="#user" type="button" role="tab" aria-controls="user"
                            aria-selected="false">User</button>
                    </li>
                </ul>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="confirmTodo">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-5">
                <div id="confirm-todo">
                    <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="support" role="tabpanel"
                        aria-labelledby="support-tab">
                        <form action="{{ route('todos.confirm') }}" method="POST" id="todosConfirm">
                            @csrf
                            @method('POST')
                            <div class="space-y-3">

                                @php
                                    $usersWithTodos = \App\Models\User::with([
                                        'todos' => function ($query) {
                                            $query->where('isConfirm', false);
                                        },
                                    ])->get();

                                    $groupedTodos = [];
                                    foreach ($usersWithTodos as $users) {
                                        foreach ($users->todos as $todos) {
                                            $groupedTodos[$users->name][] = $todos;
                                        }
                                    }

                                @endphp
                                <button id="selectAll" type="button"
                                    class="py-2 px-3 text-sm rounded-lg dark:bg-white bg-blue-800 dark:text-black text-white">
                                    Pilih
                                    Semua</button>
                                @foreach ($groupedTodos as $userName => $todos)
                                    <div>
                                        <p class="dark:text-white">{{ $userName }}:</p>
                                        <ul class="space-y-2 ">
                                            @foreach ($todos as $todo)
                                                <li>
                                                    <div
                                                        class="flex items-center gap-2 dark:bg-gray-600 bg-blue-900 text-white rounded-lg p-2 hover:bg-blue-800 dark:hover:bg-gray-500 cursor-pointer">
                                                        <label for="confirmTodo{{ $todo->id }}" class="p-2">
                                                            <input type="checkbox" class="rounded-full"
                                                                name="confirmTodo[]" value="{{ $todo->id }}"
                                                                id="confirmTodo{{ $todo->id }}">
                                                        </label>
                                                        <div id="accordion-collapse" data-accordion="collapse"
                                                            class="w-full">
                                                            <h2 id="accordion-collapse-heading-{{ $todo->id }}">
                                                                <button type="button"
                                                                    class="flex items-center justify-between w-full font-medium text-left text-black dark:text-white border-b border-gray-400 focus:bg-transparent dark:focus:bg-transparent dark:focus:text-white active:text-gray-700 dark:active:text-white dark:bg-transparent bg-transparent p-2"
                                                                    data-accordion-target="#accordion-collapse-body-{{ $todo->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="accordion-collapse-body-{{ $todo->id }}">
                                                                    <span
                                                                        class="text-sm text-white">{{ $todo->subject }}</span>
                                                                    <svg data-accordion-icon
                                                                        class="w-3 h-3 rotate-180 shrink-0"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 10 6">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M9 5 5 1 1 5" />
                                                                    </svg>
                                                                </button>
                                                            </h2>
                                                            <div id="accordion-collapse-body-{{ $todo->id }}"
                                                                class="hidden p-2 space-y-2"
                                                                aria-labelledby="accordion-collapse-heading-{{ $todo->id }}">
                                                                @if (count($todo->domains) > 0)
                                                                    <div class="flex">
                                                                        <div
                                                                            class="flex justify-between w-20 flex-none">
                                                                            <p>
                                                                                Domain
                                                                            </p>
                                                                            <p>:</p>
                                                                        </div>
                                                                        <div class="ml-1">
                                                                            {{ $todo->domains[0]->nama_domain }}
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
                                                                        {{ $todo->catatan }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                                <div class="flex gap-2">
                                    <button type="button" id="declineButton"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-600 dark:focus:ring-red-800 dark:text-white w-full">Decline</button>
                                    <button type="submit"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-700 dark:hover:bg-green-600 dark:focus:ring-green-800 dark:text-white w-full">Confirm</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="user" role="tabpanel"
                        aria-labelledby="user-tab">
                        @php
                            $todoConfirmUser = \App\Models\TodoTemp::where('status', 'pending')
                                ->with('domains', 'from')
                                ->get();
                            $user = \App\Models\User::where('isAdmin', false)
                                ->where('isSupport', true)
                                ->get();
                        @endphp
                        <ul class="space-y-2 ">
                            <div>
                                <a href="{{ route('todoTemp.index') }}">
                                    <button type="button"
                                        class="py-2 px-3 text-sm rounded-lg dark:bg-white bg-blue-800 dark:text-black text-white">
                                        Lihat
                                        Semua</button>
                                </a>
                            </div>
                            @foreach ($todoConfirmUser as $item)
                                <form action="{{ route('todos.confirmUser', $item->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <li>
                                        <div
                                            class="flex items-center gap-2 dark:bg-gray-600 bg-blue-900 text-white rounded-lg p-2 dark:hover:bg-gray-500 hover:bg-blue-800 cursor-pointer">
                                            <div id="accordion-collapse" data-accordion="collapse" class="w-full">
                                                <h2 id="accordion-collapse-heading-{{ $item->id }}">
                                                    <button type="button"
                                                        class="flex items-center justify-between w-full font-medium text-left text-black dark:text-white border-b border-gray-400 focus:bg-transparent dark:focus:bg-transparent dark:focus:text-white active:text-gray-700 dark:active:text-white dark:bg-transparent bg-transparent p-2"
                                                        data-accordion-target="#accordion-collapse-body-{{ $item->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="accordion-collapse-body-{{ $item->id }}">
                                                        <p class="text-white ">{{ $item->from->name }}</p>
                                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M9 5 5 1 1 5" />
                                                        </svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-collapse-body-{{ $item->id }}"
                                                    class="hidden p-2 space-y-2"
                                                    aria-labelledby="accordion-collapse-heading-{{ $item->id }}">
                                                    <div class="flex gap-4">
                                                        <div class="flex justify-between w-24 flex-none">
                                                            <p>
                                                                Subject
                                                            </p>
                                                            <p>:</p>
                                                        </div>
                                                        <input type="text" name="subject"
                                                            class="bg-transparent focus:ring-0 border-none w-full p-0"
                                                            value="{{ $item->subject }}">
                                                    </div>
                                                    @if ($item->domains)
                                                        <div class="flex gap-4">
                                                            <div class="flex justify-between w-24 flex-none">
                                                                <p>
                                                                    Domain
                                                                </p>
                                                                <p>:</p>
                                                            </div>
                                                            <div>
                                                                <p>
                                                                    {{ $item->domains->nama_domain }}
                                                                </p>
                                                            </div>
                                                            <input type="text" name="domain[]" class="hidden"
                                                                value="{{ $item->domains->id }}">
                                                            <input type="text" name="todoFrom" class="hidden"
                                                                value="{{ $item->todoFrom }}">
                                                        </div>
                                                    @endif
                                                    <div class="flex gap-4">
                                                        <div class="flex justify-between w-24 flex-none">
                                                            <p>
                                                                Catatan
                                                            </p>
                                                            <p>:</p>
                                                        </div>
                                                        <div class="ml-1">
                                                            <input type="text" name="catatan"
                                                                class="bg-transparent focus:ring-0 border-none w-full p-0"
                                                                value="{{ $item->catatan }}">

                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="flex gap-4 justify-between">
                                                            <div class="flex justify-between w-24 flex-none">
                                                                <p for="nama_pelanggan"
                                                                    class="block font-medium text-white">
                                                                    Nama User </p>
                                                                <p>:</p>
                                                            </div>
                                                            <div class="w-full">
                                                                <select multiple="multiple"
                                                                    class="js-example-basic-multiple js-states form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    style="width: 100%" name="user[]" required>
                                                                    @foreach ($user as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <Button type="submit"
                                                            class=" dark:bg-gray-700 bg-blue-900 text-white dark:text-gray-300 px-3 py-2 rounded text-xs sm:text-sm shadow-sm focus:outline-none hover:bg-orange-500 dark:hover:bg-gray-500">Confirm</Button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                </form>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<script>
    document.getElementById('declineButton').addEventListener('click', function() {
        var input = document.createElement('input');

        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'decline');
        input.setAttribute('value', true);

        var form = document.getElementById('todosConfirm');
        if (form) {
            form.appendChild(input);
            form.submit();
        }
    });
    $(document).ready(function() {
        $('#selectAll').on('click', function() {
            $('input[name="confirmTodo[]"]').prop('checked', true);
        });
    });
</script>
