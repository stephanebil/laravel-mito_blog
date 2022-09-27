@props(['post'])

<div class="">
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-error">Supprimer</button>
    </form>
</div>