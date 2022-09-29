@props([
    'url_img',
    'title',
    'content'
])



<div class=" max-w-md shadow-xl">
    <img  alt="{{ $title }}" class="" src="{{ asset('storage/'. $url_img)}}">
    <div class="p-4 min-h-[280px]">
        <p class="font-bold text-xl pb-4">{{ $title }}</p>
        <p class="">{{ Str::substr($content, 0, 90)  }}...</p>
    </div>
</div>