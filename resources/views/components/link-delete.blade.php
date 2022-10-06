@props(['routeName', 'itemId', 'linkName'])
@auth
    <a href="{{ route($routeName, $itemId) }}" class="btn btn-outline-error btn-xs ">{{ $linkName }}</a>    
@endauth