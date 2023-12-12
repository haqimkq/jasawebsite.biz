<x-app-layout>

    <div class="text-white p-10">
        <form method="post" action="{{ route('articles.update', $article->id) }}">
            @csrf
            @method('PUT')
            <div class="border border-white roudned-lg rounded-lg my-5">
                <div class="bg-gray-600 p-3 rounded-t-lg text-xl font-extrabold">
                    <h1>Create Article</h1>
                </div>
                <div class="p-3 space-y-3">
                    <div class="space-y-3">
                        <label for="">Judul</label>
                        <input class="w-full rounded-lg bg-gray-600 py-2 px-3" name="title"
                            value="{{ $article->title }}" required>
                    </div>
                    <div class="space-y-3">
                        <label for="">Deskripsi</label>
                        <textarea class="h-screen" name="article" id="wiswig">{{ $article->article }}</textarea>
                    </div>
                    <div>
                        <button class="p-3 bg-white text-black rounded-lg text-sm tracking-widest"
                            type="submit">Edit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
