<div class="space-y-3" id="containerTodoUpdate">
    <div class="p-3 space-y-3 sortable-container" id="sortable-container1">
        @foreach ($todo as $item)
            @if ($item->status == 'todo')
                @foreach ($item->users as $items)
                    @if ($items->id == Auth::id())
                        @include('master.todo.item')
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
</div>
