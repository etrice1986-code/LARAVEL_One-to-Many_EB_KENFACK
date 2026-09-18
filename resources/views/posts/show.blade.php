<x-layout :title="$post->title">
@if($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" 
         class="w-100 mb-4 rounded" 
         style="max-height: 400px; object-fit: cover;">
@endif

    <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

    <p class="text-muted">
        Creato il {{ $post->created_at->format('d/m/Y') }}
    </p>

    <p class="fs-5">{{ $post->content }}</p>

    <hr>

    <div class="d-flex gap-2">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">
            Modifica
        </a>
       
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Elimina</button>
        </form>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary">
            Torna alla lista
        </a>
    </div>

</x-layout>
