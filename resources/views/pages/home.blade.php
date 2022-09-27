<x-layouts.main-layout title="Accueil">
    <p class="text-red-500">Hello world olellelelellelele</p>
    {{-- @foreach ($arrs as $arr)
        <li>{{ $arr }}</li>
    @endforeach --}}
    {{-- @foreach ($games as $game)
        <li>{{ $game }}</li>
    @endforeach --}}
    {{-- @foreach ($arrGames as $arrGame)
        <li>{{ $arrGame }}</li>
    @endforeach --}}
    @foreach ($posts as $post)
        <p class="font-bold">{{ $post->title }}</p>
        <p>{{ $post->content }}</p>
    @endforeach
</x-layouts.main-layout>