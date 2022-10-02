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
    </div>
</x-layouts.main-layout>