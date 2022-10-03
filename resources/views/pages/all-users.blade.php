<x-layouts.main-layout title="Tous les utilisateurs">
   <div class="container p-12">
        <h1 class="">Tous mes utilisateurs</h1>
        @include('partials._table-allUsers')
        {{-- pagination --}}
        <div class="my-12">
            {{ $users->links('pagination::tailwind') }}
            {{-- {{ $users->links('pagination::simple-tailwind') }} --}}
        </div>
    </div>
</x-layouts.main-layout>