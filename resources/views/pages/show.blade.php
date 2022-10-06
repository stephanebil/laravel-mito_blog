@php
    // dd($post->images);
@endphp
<x-layouts.main-layout :title="$post->title">
    <div class="container mb-10">
        {{-- <p>{{ $post->featuredImage->slug }}</p> --}}
        <div class="flex space-x-4">
            @if (count($post->images) > 0 )
                <div class="space-y-2 bg-gray-200 p-4">
                    @foreach ( $post->images as $image)
                        <img src="{{ asset($image->slug) }}" alt="" class="w-52">
                        @auth
                            <a href="{{ route('delete.img', $image->id) }}" class="btn btn-outline-error btn-xs ">X</a>    
                        @endauth
                        
                    @endforeach
                </div>
            @endif
                
            <img src="{{ asset('storage/' . $post->url_img)}}" alt="{{ $post->title }}" class="w-[50%]">
        </div>
        
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
            @guest
                <p class="py-16 text-center">Connecte toi pour poster un commentaire </p>
            @endguest
            @auth
                <form action="{{ route('comment.store', $post->id) }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Votre commentaire" name="content">
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                    <x-error-msg name="content"/>
                </form>
            @endauth
                

            <div class="bg-gray-50 p-5">
                @forelse ( $post->comments as $comment )
                <div class="my-2 bg-gray-200 p-2">
                   <p class="">{{ $comment->content }}</p>
                   <p class="text-xs text-gray-500">Créé le {{ $comment->created_at->format('d/m/y') }}</p> 
                </div>    
                
                @empty
                    <p>Soyez le premier à écrire un commentaire</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.main-layout>