<div class="space-y-3" id="containerToUpdate">
    <button data-modal-target="deleteTodo" data-modal-toggle="deleteTodo" id="bttn"
        class="w-full py-1 font-extrabold hover:bg-gray-200 bg-white border border-gray-300 rounded-lg">
        Submit
    </button>
    <x-modal.delete-todo>
    </x-modal.delete-todo>
    <div class="p-3 space-y-3 sortable-container" id="sortable-container3">
        @foreach ($todo as $item)
            @if ($item->status == 'done')
                @foreach ($item->users as $items)
                    @if ($items->id == Auth::id())
                        @include('master.todo.item')
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
    <script>
        bttn = document.getElementById('bttn');
        bttn.addEventListener('click', function() {
            let subjectTodo = document.getElementById('subjectTodo');
            $.ajax({
                method: "GET",
                url: "/todos/getDone",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    let subjectTodo = document.getElementById('subjectTodo');
                    subjectTodo.innerHTML = "";

                    response.forEach((item, index) => {
                        const li = document.createElement('li');

                        const checkbox = document.createElement('input');
                        const label = document.createElement('label');
                        label.classList =
                            'w-full dark:bg-gray-600 bg-blue-900 text-white rounded-lg p-2 flex items-center gap-2 hover:bg-gray-500 cursor-pointer';
                        label.for = 'deleteTodo' + item.id;
                        checkbox.id = 'deleteTodo-' + item.id;
                        checkbox.type = 'checkbox';
                        checkbox.name = 'deleteTodo[]';
                        checkbox.value = item.id;
                        checkbox.checked = true;
                        checkbox.classList = 'rounded-full';

                        li.appendChild(label);
                        label.appendChild(checkbox);
                        label.appendChild(document.createTextNode(item.subject));

                        subjectTodo.appendChild(li);
                    });
                },


                error: function(err) {
                    console.log(err);
                }
            });
        });
    </script>
</div>
