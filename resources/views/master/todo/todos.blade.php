<x-app-layout title="To Do List">
    <div class="w-full text-white py-3 px-5 items-center rounded-b-lg dark:bg-gray-700 bg-blue-900 flex justify-between">
        <p>To Do List</p>
        <div id="loading" class="loader" style="display: none"></div>
        <a href="{{ route('todos.viewReport') }}" class="underline">Lihat Report</a>
    </div>
    <div class="grid sm:grid-cols-3 grid-cols-1 place-content-center gap-10 p-10">
        <div class="w-full">
            <fieldset class="w-full border rounded-xl p-3 dark:bg-gray-600 bg-blue-900">
                <legend data-modal-target="addTodo" data-modal-toggle="addTodo"
                    class="px-5 py-1 text-white bg-orange-600 hover:bg-orange-500 dark:hover:bg-gray-700 dark:bg-gray-800 rounded border border-gray-700 text-sm flex gap-2 items-center cursor-pointer"
                    align="center">
                    <p>Todo</p>
                    <button><i class="fa-solid fa-plus-circle"></i></button>
                </legend>
                <div class="column min-h-[40px] space-y-3">
                    @include('master.todo.container1')
                </div>
            </fieldset>
        </div>
        <x-modal.addTodoModal :domain="$domain" :label="$label" :sublabel="$sublabel"></x-modal.addTodoModal>
        <div class="w-full">
            <fieldset class="w-full border rounded-xl p-3 dark:bg-gray-600 bg-blue-900">
                <legend
                    class="px-5 py-1 text-white bg-orange-600 dark:bg-gray-800 rounded border border-gray-700 text-sm"
                    align="center">
                    <p>
                        Doing
                    </p>
                </legend>
                <div class="column min-h-[40px] space-y-3">
                    @include('master.todo.container2')
                </div>
            </fieldset>
        </div>
        <div class="w-full">
            <fieldset class="w-full border rounded-xl p-3 dark:bg-gray-600 bg-blue-900">
                <legend
                    class="px-5 py-1 text-white bg-orange-600 dark:bg-gray-800 rounded border border-gray-700 text-sm"
                    align="center">
                    <p>
                        Done
                    </p>
                </legend>
                <div class="column min-h-[40px] space-y-3">
                    @include('master.todo.container3')
                </div>
            </fieldset>
        </div>
    </div>

</x-app-layout>
{{-- Drag and Drop --}}
<script type="text/javascript">
    var loading = document.getElementById('loading');
    const containers = document.querySelectorAll(".sortable-container");
    containers.forEach(container => {
        const sortableContainer = new Sortable(container, {
            group: {
                name: "shared",
                pull: true,
                put: true,
            },
            animation: 150,
            onEnd: function(evt) {
                const itemId = evt.item.getAttribute("data-id");
                const targetContainerIndex = Array.from(containers).indexOf(evt.to);
                loading.style.display = 'block';
                $.ajax({
                    method: "POST",
                    url: "/todos/changeStatus",
                    data: {
                        id: itemId,
                        status: targetContainerIndex,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        loading.style.display = 'none';
                    },
                    error: function(err) {
                        console.error("Terjadi kesalahan: " + err.statusText);
                    }
                });
            }
        });
    });
</script>
{{-- Post On Input --}}
<script>
    $(document).ready(function() {
        $('.todo-item textarea').on('input', function() {
            var catatan = $(this).val();
            var todoId = $(this).data('todo-id');
            loading.style.display = 'block';
            $.ajax({
                url: '/todos/changeNote',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    catatan: catatan,
                    todo_id: todoId
                },
                success: function(response) {
                    loading.style.display = 'none';
                },
                error: function(error) {}
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.inputSubject').on('input', function() {
            var subject = $(this).val();
            var todoId = $(this).data('todo-id');
            loading.style.display = 'block';
            $.ajax({
                url: '/todos/changeSubject',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    subject: subject,
                    todo_id: todoId
                },
                success: function(response) {
                    loading.style.display = 'none';
                },
                error: function(error) {}
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var textareas = document.querySelectorAll('.auto-expanding-textarea');
        textareas.forEach(function(textarea) {
            var id = textarea.id;
            var textareaHeights = [];
            textareaHeights[id] = textarea.scrollHeight;
        });
    });

    function setTextareaHeight(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';
    }

    function autoResizeTextarea(todoID) {
        var textarea = document.getElementById('textarea-' + todoID);
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }

    document.querySelectorAll('[data-accordion-target]').forEach(function(button) {
        button.addEventListener('click', function() {
            var targetAttribute = button.getAttribute('data-accordion-target');
            var targetID = targetAttribute.replace('#accordion-todo-body-', '');
            autoResizeTextarea(targetID);
        });
    });

    document.querySelectorAll('.auto-expanding-textarea').forEach(function(textarea) {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
</script>
<script>
    function toggleElementVisibility(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            element.classList.toggle('hidden');
        }
    }

    const toggleButtons = document.querySelectorAll('.toggle-button');

    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.toggle-button');
        buttons.forEach(function(button) {
            const targetId = button.getAttribute('data-target');
            const id = targetId.replace('div', "");
            const targetTextArea = document.getElementById('textarea-' + id);
            const targetElement = document.getElementById(targetId);
            targetElement.style.display = 'block';
            targetTextArea.style.height = 'auto';
            targetTextArea.style.height = (targetTextArea.scrollHeight) + 'px';
            const scrollHeight = targetElement.scrollHeight;
            targetElement.style.display = '';

        });
    });

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            toggleElementVisibility(targetId);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.fileInput').change(function(e) {
            e.preventDefault();

            var formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            var files = $(this)[0].files;
            const idTodo = $(this).data('todo-id');
            for (var i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }
            loading.style.display = 'block';

            $.ajax({
                url: '{{ route('fileTodo.store', ':id') }}'.replace(':id', idTodo),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = (evt.loaded / evt.total) * 100;
                            $('#progressBarStatus-' + idTodo).width(
                                percentComplete + '%');
                        }
                    }, false);
                    return xhr;
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
