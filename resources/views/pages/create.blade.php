<x-layouts.main-layout title="Création article">
    <div class="container">
        <h1 class="font-bold text-4xl pb-10 pt-10 text-center">New Post</h1>
        <form class="" method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="">
                {{-- title --}}
                <input type="text" class="block w-full rounded-lg border-gray-400" placeholder="Titre du post" type="text" name="title" value="{{ old('title') }}">
                <x-error-msg name="title" />
                {{-- content --}}
                <textarea name="content" cols="30" row="10" class="mt-5 block w-full rounded-lg border-gray-400" placeholder="Votre contenu ...">{{ old('content') }}</textarea>
                <x-error-msg name="content" />
                {{-- image --}}
                <input class="block w-full rounded-lg border-gray-400" name="url_img" placeholder="Url de votre image" type="text" value="https://source.unsplash.com/640x480/?person?1">
                <button class="btn btn-primary mt-6 w-full">Envoyer</button>
            </div>
        </form>
    </div>
</x-layouts.main-layout>