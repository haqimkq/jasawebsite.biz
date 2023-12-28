@foreach ($todo->file as $item)
    <div class="flex items-center">
        <a href="{{ route('fileTodo.download', $item->id) }}" target="_blank"
            class="p-2 bg-gray-700 rounded-lg rounded-r-none border-r text-white text-sm hover:bg-gray-600">
            {{ preg_replace('/\{[^}]*\}/', '', $item->nama_file) }}
        </a>
        <div>
            <button id="deleteFile-{{ $item->id }}" type="submit" data-file-id="{{ $item->id }}"
                data-todo-id="{{ $todo->id }}" class=" p-2 rounded-r-lg bg-gray-700 text-white hover:bg-red-500 h-9">
                <i class="fa-solid fa-trash fa-sm "></i>
            </button>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#deleteFile-' + {{ $item->id }}).click(function() {
                const fileId = $(this).data('file-id');
                const idTodo = $(this).data('todo-id');
                loading.style.display = 'block';
                $.ajax({
                    url: '{{ route('fileTodo.destroy', ':id') }}'.replace(':id', fileId),
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        $('#fileContainer-' + idTodo).load(
                            '{{ route('todos.fileContainer', ':id') }}'
                            .replace(
                                ':id', idTodo));
                        loading.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endforeach
