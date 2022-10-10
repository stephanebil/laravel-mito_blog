<x-layouts.main-layout title="Liste des catégories">
    <div class="container">
        <h1 class="text-4xl text-center">Gérer les catégories</h1>
        {{-- // ne jamais oublier method dans form --}}
        <form action="" method="POST"> 
            @csrf
            <div class="">
                <input type="text" name="category" placeholder=""  class="@error('category') border-red-500 @enderror">
                {{-- name= category ça veut dire que ce mot est dans la BDD --}}
                <button type="submit" class="btn btn-primary ">Enregistrer</button>
                <x-error-msg name="category"/>
            </div>    
        </form>
        @forelse ($categories as $category )
            <div class="border-b py-3">
                <p class="uppercase">{{ $category->category }}</p>
                <div class="">
                    <a href="{{ route('category.edit', $category->id) }}" class="bg-blue-500">modifier</a>
                    {{-- <a href="" class="bg-red-500">delete</a> --}}
                    <x-link-delete routeName="category.delete" :itemId="$category->id" linkName="supprimer"/>
                </div>
            </div>
            
        @empty
            <p>Pas de catégories enregistrée actuellement</p>
        @endforelse
    </div>
</x-layouts.main-layout>