@if ($results !== null)
    <h2>Hasil Pencarian:</h2>
    <ul>
        @foreach ($results as $result)
            <li>{{ $result->nama_domain }}</li>
        @endforeach
    </ul>
@else
    <p>Tidak ada hasil pencarian.</p>
@endif
