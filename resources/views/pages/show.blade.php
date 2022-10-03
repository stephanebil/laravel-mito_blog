<x-layouts.main-layout :title="$post->title">
    <div class="container mb-10">
        <img src="{{ asset('storage/' . $post->url_img)}}" alt="" class="">
        <div class="">
            <p class="text-3xl font-black py-8">{{ $post->title }}</p>
            <p class="">{!! nl2br(e($post->content)) !!}</p>
            @auth
                <div class="pt-6">
                    <x-btn-delete :post="$post"/>
                    <a href="{{ $post->id }}/edit" class="btn btn-success">Modifier</a>
                </div>
            @endauth
        </div>
        <div class="my-14 bg-blue-100 p-5">
            <h2 class="text-2xl font-black">Commentaires</h2>
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="text" placeholder="Votre commentaire" name="content">
                <button class="btn btn-primary" type="submit">Envoyer</button>
                <x-error-msg name="content"/>
            </form>
        </div>
    </div>
</x-layouts.main-layout>