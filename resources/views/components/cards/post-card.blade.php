@props([
    'url_img',
    'title',
    'content'
])



<div class=" max-w-md shadow-xl">
    <img src="{{ $url_img }}" alt="{{ $title }}" class="">
    <div class="p-4 min-h-[280px]">
        <p class="font-bold text-xl pb-4">{{ $title }}</p>
        <p class="">{{ Str::substr($content, 0, 90)  }}...</p>
    </div>
</div>