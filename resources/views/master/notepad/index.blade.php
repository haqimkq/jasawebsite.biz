<x-app-layout>
    <div class="max-w-xl border rounded-lg mx-auto p-3 space-y-2">
        <div class="flex items-center justify-between border-b">
            <p class="text-white text-xl font-extrabold">Notepad</p>
            <div>
                <button data-modal-target="addNotepad" data-modal-toggle="addNotepad"
                    class="text-white text-2xl px-3 py-2 leading-none">+</button>
                <x-modal.addNotepad></x-modal.addNotepad>
            </div>
        </div>
        <div class="py-3 space-y-2">
            @if (count($notepad) > 0)
                @foreach ($notepad as $item)
                    <div class=" w-full h-10 border-t-2 border-gray-500 bg-gray-700 flex items-center p-2 relative"
                        data-modal-target="editNotepad-{{ $item->id }}"
                        data-modal-toggle="editNotepad-{{ $item->id }}">
                        <p class="text-white textNotepad line-clamp-1" data-id="{{ $item->id }}">
                            {{ $item->notepad }}</p>
                        <div class="absolute top-0 right-1 z-10 text-red-500 hover:text-red-400">
                            <form action="{{ route('notepad.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fa-solid fa-x fa-sm"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <x-modal.editNotepad :notepad="$item"></x-modal.editNotepad>
                @endforeach
            @else
                <div class=" w-full h-10 border-t-2 border-gray-500 bg-gray-700 flex items-center p-2"
                    data-modal-target="addNotepad" data-modal-toggle="addNotepad">
                    <p class="text-white">Take a Note..</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
<script>
    const textAreas = document.querySelectorAll('.textAreaNotepad');
    const textElements = document.querySelectorAll('.textNotepad');
    var loading = document.getElementById('loading');

    textAreas.forEach(textArea => {
        textArea.addEventListener('input', function(event) {
            const newText = event.target.value;
            const dataId = event.target.getAttribute('data-id');
            loading.style.display = 'block';
            $.ajax({
                url: '/notepad/' + dataId,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    notepad: newText,
                },
                success: function(response) {
                    loading.style.display = 'none';
                },
                error: function(error) {}
            });

            textElements.forEach(textElement => {
                if (textElement.getAttribute('data-id') === dataId) {
                    textElement.textContent = newText;
                }
            });
        });
    });
</script>
