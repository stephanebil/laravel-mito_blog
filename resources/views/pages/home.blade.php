<x-layouts.main-layout title="Accueil">
    <div class="container">
        <p class="text-indigo-500 text-center font-black text-4xl pt-10 pb-10">Laravel Mito Blog</p>
        {{-- @foreach ($arrs as $arr)
            <li>{{ $arr }}</li>
        @endforeach --}}
        {{-- @foreach ($games as $game)
            <li>{{ $game }}</li>
        @endforeach --}}
        {{-- @foreach ($arrGames as $arrGame)
            <li>{{ $arrGame }}</li>
        @endforeach --}}
        <div class="grid grid-cols-4 gap-3">
            @foreach ($posts as $post)
             
            <a href="posts/{{ $post->id }}" class="">
                <x-cards.post-card :content="$post->content" :title="$post->title" :url_img="$post->url_img"/>
            </a>
            @endforeach
        </div>
    </div>    
</x-layouts.main-layout>