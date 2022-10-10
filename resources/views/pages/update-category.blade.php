<x-layouts.main-layout title="Liste des catégories">
    <div class="container">
        <h1 class="text-4xl text-center">Gérer les catégories</h1>
        {{-- // ne jamais oublier method dans form --}}
        <form action="{{ route('category.update', $category->id) }}" method="POST"> 
            @csrf
            @method('PUT')
            <div class="">
                <input type="text" name="category" placeholder=""  class="@error('category') border-red-500 @enderror" value="{{ old('category', $category->category) }}">
                {{-- name= category ça veut dire que ce mot est dans la BDD --}}
                <button type="submit" class="btn btn-primary ">Modifier</button>
                <x-error-msg name="category"/>
            </div>    
        </form>
        
    </div>
</x-layouts.main-layout>