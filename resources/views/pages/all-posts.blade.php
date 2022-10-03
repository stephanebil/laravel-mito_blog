<x-layouts.main-layout title="Tous mes articles">
    <div class="container">
        <h1 class="">Tous mes articles</h1>
        @include('partials._table-allPosts')
        {{-- pagination --}}
        <div class="my-12">
            {{ $posts->links('pagination::tailwind') }}
            {{-- {{ $posts->links('pagination::simple-tailwind') }} --}}
        </div>
    </div>
</x-layouts.main-layout>