<x-app-layout>
    <div class="flex w-full px-10">
        <div class="w-full space-y-3 bg-white rounded-lg p-3">
            <p class="bg-gray-900 text-white rounded-md px-2 text-sm py-1">
                <a href="">Home</a>
                ›
                <a href="">Donasi</a>
                ›
                <a href="">{{ $article->spun_title }}</a>
            </p>
            <p class="text-3xl font-extrabold">
                {{ $article->spun_title }}
            </p>
            <p class="text-xs">
                {{ $article->created_at->format('M d Y') }}
            </p>
            <div class="overflow-hidden rounded-lg">
                <img class="w-full h-auto rounded-lg hover:scale-125 duration-[2000ms]"
                    src="https://media.istockphoto.com/id/1423433891/id/foto/potret-tim-bisnis.jpg?s=1024x1024&w=is&k=20&c=t951jknxBqerHx-tXdHq1azKsnebarF4dMuCD8x5kPk="
                    alt="">
            </div>
            <div class="w-full">
                <article class="w-full prose ">
                    {!! $article->spun_article !!}
                </article>
            </div>
        </div>
        <div class="w-1/3"></div>
    </div>
</x-app-layout>
