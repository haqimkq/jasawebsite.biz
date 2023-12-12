<div class="space-y-3" id="containerToUpdate">
    @if ($domainsDone->count() > 0)
        @foreach ($domainsDone as $domain)
            <div class="border rounded-xl text-white bg-gray-900">
                <div class="px-3 py-2 bg-gray-800 rounded-t-xl">
                    {{ $domain->nama_domain }}
                </div>
                <div class="p-3 space-y-3">
                    @foreach ($domain->todos as $todo)
                        @if ($todo->status == 'done')
                            @foreach ($todo->users as $item)
                                @if ($item->id == Auth::id())
                                    <div class="flex gap-2">
                                        <div class="todo-item w-full flex">
                                            <div id="accordion-todo" data-accordion="collapse" class="w-full">
                                                <h2 id="accordion-todo-heading-{{ $todo->id }}">
                                                    <button type="button"
                                                        class="flex items-center justify-between w-full p-2 text-sm text-left text-gray-500 border border-gray-200 rounded-xl focus:ring-0 dark:focus:ring-0 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                        data-accordion-target="#accordion-todo-body-{{ $todo->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="accordion-todo-body-{{ $todo->id }}">
                                                        <span
                                                            class="text-ellipsis line-clamp-1">{{ $todo->subject }}</span>
                                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M9 5 5 1 1 5" />
                                                        </svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-todo-body-{{ $todo->id }}" class="hidden mt-1"
                                                    aria-labelledby="accordion-todo-heading-{{ $todo->id }}">
                                                    <textarea rows="1" type="text" id="textarea-{{ $todo->id }}"
                                                        class="auto-expanding-textarea bg-gray-600 rounded-xl w-full" name="catatan" data-todo-id="{{ $todo->id }}"
                                                        onload="this.style.height = ''; this.style.height = (this.scrollHeight) + 'px';">{{ $todo->catatan }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            <button class="toDoingButton" type="button"
                                                data-todo-id="{{ $todo->id }}">
                                                <div
                                                    class="w-[30px] h-[30px] border rounded-xl flex items-center p-3 justify-center">
                                                    <i class="fa fa-spinner"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <div class="border-white border text-sm text-center px-3 py-2 bg-gray-800 rounded-xl text-white">
            Tidak Ada Data
        </div>
    @endif
</div>
<script>
    $(document).ready(function() {
        $('.toDoingButton').on('click', function() {
            var todoButtonId = $(this).data('todo-id');
            var statusToDoing = 'doing';
            $.ajax({
                url: '/todos/changeStatus',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: statusToDoing,
                    todo_id_status: todoButtonId
                },
                success: function(response) {
                    $('#containerToUpdate').load('/todos/container');
                },
                error: function(error) {}
            });
        });
    });
</script>
