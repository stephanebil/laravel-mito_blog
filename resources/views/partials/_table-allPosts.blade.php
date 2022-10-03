@php
    $index =1
@endphp

<div class="overflow-x-auto">
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Title</th>
        <th>date</th>
        <th>Publier</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      @forelse ( $posts as $post )
        <tr>
            <th>{{ $index++ }}</th>
            <td>{{ $post->title }}</td>
            {{-- <td>{{ $post->created_at->toDateString() }}</td> --}}
            <td>{{ $post->created_at->format('d/m/Y') }}</td>
            @if ($post->is_published == 0)
                <td>Non</td>  
            @else
                <td>Oui</td>
            @endif
        </tr>
      @empty
        <tr>
            <td>Pas de post actuellement ! </td>
        </tr>
      @endforelse
      
      
      
    </tbody>
  </table>
</div>