<div class="todo-item w-full flex sortable-item" data-id="{{ $item->id }}">
    <div id="accordion-todo" data-accordion="collapse" class="w-full">
        <div>
            <button
                class="btn bg-white  toggle-button flex items-center justify-between w-full p-2 text-sm text-left text-gray-500 border border-gray-200 rounded-xl focus:ring-0 dark:focus:ring-0 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:bg-gray-800"
                data-target="div{{ $item->id }}"
                @if ($item->isConfirm == false) title="Todo belum Di Konfirmasi" @endif>
                <div class="w-full">
                    @if ($item->isConfirm == false)
                        <input value="{{ $item->subject }}" data-todo-id="{{ $item->id }}"
                            class="inputSubject text-ellipsis line-clamp-1 bg-transparent text-red-500 w-full">
                    @else
                        <span
                            class="text-ellipsis line-clamp-1 dark:text-white text-black subjectText">{{ $item->subject }}</span>
                    @endif
                    @if (isset($item->domains[0]))
                        <div class="flex items-center gap-1 ">
                            <a href="//wa.me/{{ $item->domains[0]->pelanggan->no_hp }}">
                                <i class="fa-brands fa-lg fa-whatsapp text-green-500"></i>
                            </a>
                            <span class="text-ellipsis line-clamp-1 text-xs">{{ $item->domains[0]->nama_domain }}</span>
                        </div>
                    @endif
                </div>
                <div class="flex gap-1 items-center">
                    <div>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </div>
                    <div data-modal-target="addFileTodo-{{ $item->id }}"
                        data-modal-toggle="addFileTodo-{{ $item->id }}">
                        <i class="fa-solid fa-paperclip"></i>
                    </div>
                </div>
            </button>
            <div class="bod hidden mt-1" id="div{{ $item->id }}">
                @if ($item->isConfirm == false)
                    <form action="{{ route('todos.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="w-full bg-red-700 text-white rounded-lg p-1 text-xs mb-1">Hapus</button>
                    </form>
                @endif
                <textarea type="text" id="textarea-{{ $item->id }}" rows="1"
                    class="auto-expanding-textarea dark:bg-gray-600 bg-gray-100 rounded-xl w-full dark:text-white text-black text-sm"
                    name="catatan" data-todo-id="{{ $item->id }}">{{ $item->catatan }}</textarea>
            </div>
        </div>
    </div>
</div>
<x-modal.addFileTodo :todo="$item"></x-modal.addFileTodo>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var subjectTexts = document.querySelectorAll('.subjectText');

        subjectTexts.forEach(function(subjectText) {
            subjectText.addEventListener('click', function() {
                if (subjectText.classList.contains('text-ellipsis')) {
                    subjectText.classList.remove('text-ellipsis');
                    subjectText.classList.remove('line-clamp-1');
                } else {
                    subjectText.classList.add('line-clamp-1');
                    subjectText.classList.add('text-ellipsis');
                }
            });
        });
    });
</script>
