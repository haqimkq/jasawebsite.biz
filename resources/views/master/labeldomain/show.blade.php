<x-app-layout>
    <div class=" w-min p-3">
        <div class=" dark:bg-gray-600 bg-blue-900 rounded-lg flex items-center px-3 border-gray-500 border">
            <i class="fa fa-tags" style="color: {{ $labelDomain->color }}"> </i>
            <p class="whitespace-nowrap text-white p-3 text-sm">
                {{ $labelDomain->name }}
            </p>
        </div>
    </div>
    <div class="p-3">
        <div class="rounded-lg overflow-x-auto border border-gray-600">
            <table class="dark:text-white text-black text-sm w-full" id="labelDomainTable">
                <tr class="dark:bg-gray-600 bg-blue-900 text-white">
                    <td class="p-2 border-collapse border-gray-400 text-sm text-center">No</td>
                    <td class="p-2 border-collapse border-gray-400 text-sm text-center">Sub Label</td>
                    <td class="p-2 border-collapse border-gray-400 text-sm text-center">Nama Domain</td>
                    <td class="p-2 border-collapse border-gray-400 text-sm text-center">Nama Pemilik</td>
                    <td class="p-2 border-collapse border-gray-400 text-sm text-center">Keterangan</td>
                    @if (Auth::user()->isAdmin == true)
                        <td class="p-2 border-collapse border-gray-400 text-sm text-center">Action</td>
                    @endif
                </tr>
                @foreach ($labelDomain->domain as $item)
                    <tr>
                        <td class="p-1 text-center">{{ $loop->index + 1 }}</td>
                        <td class="p-1 text-start">
                            <div class="flex items-center w-full ">
                                <ul>
                                    @foreach ($item->subLabel as $items)
                                        @if ($labelDomain->id == $items->pivot->label_domain_id)
                                            <p class="text-white w-full rounded-lg text-xs text-area-keterangan">
                                                {{ $items->name }}</p>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td class="p-1 text-start">
                            <a href="{{ route('domain.show', ['slug' => $item->slug]) }}">{{ $item->nama_domain }}</a>
                        </td>
                        <td class="p-1 text-start"><a
                                href="{{ route('pelanggan.show', ['pelanggan' => $item->pelanggan->id]) }}">{{ $item->pelanggan->nama_pelanggan }}</a>
                        </td>
                        <td class="p-1 text-start">
                            <div class="flex items-center w-full ">
                                @if (Auth::user()->isAdmin == true)
                                    <textarea class="text-white bg-gray-600 overflow-hidden w-full rounded-lg text-xs text-area-keterangan"
                                        name="keterangan" id="" rows="1" data-domain-id="{{ $item->id }}"
                                        data-label-id="{{ $labelDomain->id }}">{{ $item->pivot->keterangan }}</textarea>
                                @else
                                    <p>{{ $item->pivot->keterangan }}</p>
                                @endif
                            </div>
                        </td>
                        @if (Auth::user()->isAdmin == true)
                            <td class="p-1">
                                <div class="flex justify-center items-center gap-3">
                                    <form
                                        action="{{ route('labelDomain.domainDelete', ['domain' => $item->id, 'label' => $labelDomain->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>
                                            <i class="fa fa-trash text-red-600 "></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('.text-area-keterangan').on('input', function() {
            var domainId = $(this).data('domain-id');
            var labelId = $(this).data('label-id');
            var keterangan = $(this).val();
            $.ajax({
                url: '/labelDomain/editKeterangan/' + domainId + '/' + labelId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    keterangan: keterangan,
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    document.querySelectorAll('.text-area-keterangan').forEach(function(textarea) {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
    window.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.text-area-keterangan').forEach(function(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        });
    });
</script>
