<x-layouts.main-layout title="Création article">
    <div class="container">
        <h1 class="font-bold text-4xl pb-10 pt-10 text-center">Update Post</h1>
        <form class="" method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="">
                {{-- title --}}
                <input type="text" class="block w-full rounded-lg border-gray-400" placeholder="Titre du post" type="text" name="title" value="{{ old('title', $post->title) }}">
                <x-error-msg name="title" />
                {{-- content --}}
                <textarea name="content" cols="30" row="10" class="mt-5 block w-full rounded-lg border-gray-400" placeholder="Votre contenu ...">{{ old('content', $post->content) }}</textarea>
                <x-error-msg name="content" />
                {{-- is published --}}
                <div class="">
                    <label for="">Publication</label>
                    <input @checked(old('is_published', $post->is_published)) name="is_published" type="checkbox" value="is_published">
                
                </div>
                {{-- image --}}
                <div class="">
                    <label for="">Choisir une image</label>
                    <input id="" type="file" name="url_img" class="block">
                    <x-error-msg name="url_img" />
                </div>
                 {{-- others images --}}
                <div class="">
                    <label for="">Others images:</label>
                    <input id="" type="file" name="images[]" class="block" id="" multiple>
                    <x-error-msg name="images" />
                </div>
                {{-- <input class="block w-full rounded-lg border-gray-400" name="url_img" placeholder="Url de votre image" type="text" value="https://source.unsplash.com/640x480/?person?1"> --}}
                <button class="btn btn-primary mt-6 w-full">Envoyer</button> 
            </div>
        </form>
    </div>
</x-layouts.main-layout>